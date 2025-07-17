<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\DatabaseConnection;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;

class dashmanajemennmuController extends Controller
{
    public function index(Request $request)
    {

        return view('dashboardmanajnmu');
    }
    public function dataset(Request $request)
    {
        $kdlokasi = $request->kdlokasi;
        $kode1 = $request->kode1;
        $unit = DB::connection('mysql')->table('ms_unitnmu')
            ->where('kdlokasi', '=', $kdlokasi)
            ->get();
        foreach ($unit as $u) {
            $dbname = $u->dbname;
            $host = $u->host;
            $username = $u->username;
            $password = $u->password;
            $port = $u->port;
        }
        $params['connection_name'] = 'onthefly';
        $params['database'] = $dbname;
        $params['driver'] = 'mysql';
        $params['host'] = $host;
        $params['username'] = $username;
        $params['password'] = $password;
        $params['port'] = $port;
        $connection = DatabaseConnection::setConnection($params);
        $pasranap = $connection->table('dafinap')
            ->select(
                [
                    'dafinap.nori', 'dafinap.nomrm', 'dafinap.nmpasien', 'dafinap.kddokter', 'mtdokter.kddokter', 'mtdokter.nmdokter', 'mtdokter.nmahli', 'tglmasuk',
                    'dafinap.kdkons', 'dafinap.nmkons', 'dafinap.noasuransi', 'nosep', 'jthkelas', 'tgllahir'
                ]
            )
            ->join('pasien', 'dafinap.nomrm', '=', 'pasien.nomrm')
            ->join('mtkamar', 'dafinap.kdkamar', '=', 'mtkamar.kdkamar')
            ->join('tindakan3', 'mtkamar.nomer', '=', 'tindakan3.nomer')
            ->join('mtdokter', 'dafinap.kddokter', '=', 'mtdokter.kddokter')
            ->where('dafinap.sttsinp', '=', '1')
            ->where('dafinap.tglkeluar', '=', 0000 - 00 - 00)
            ->where('tindakan3.kode1', '=', $kode1)
            ->where('dafinap.kdjnspas', '=', '06')
            // ->where('nori','=', 202302369)
            ->get();
        $finalArray = array();

        foreach ($pasranap as $datapasien) {
            //ambil total tindakan per pasien
            $tindakan = $connection->select(
                "SELECT SUM(ttltarip) as billing_tindakan FROM tin3 where nori = $datapasien->nori group by nori"
            );
            $totalbilltindakan = collect($tindakan);
            foreach ($totalbilltindakan as $billtindakan) {
                //ambil total bill obat per pasien
                $obat = $connection->select(
                    "SELECT SUM(jmlditanggung) as billing_obat FROM jualop2 where nori = $datapasien->nori group by nori"
                );
                $totalbillobat = collect($obat);
                foreach ($totalbillobat as $billingobat) {
                    //ambil harga kamar by jenis rekanan per pasien
                    $kamar = $connection->select(
                        "SELECT a.nori, a.nmpasien, b.nmkamar, ((DATEDIFF(CURDATE(), a.tglmasuk)+1) * c.tarip) AS billkamar, c.tarip FROM dafinap a
                        JOIN mtkamar b 
                        ON a.kdkamar = b.`kdkamar`
                        JOIN tindakan3kons c
                        ON b.nomer = c.nomer
                        WHERE a.nori = $datapasien->nori
                        AND c.kdkons = $datapasien->kdkons"
                    );
                    $hargakamar = collect($kamar);
                    if ($hargakamar->isEmpty()) {
                        //ambil harga kamar default per pasien
                        $kamar = $connection->select(
                            "SELECT a.nori, a.nmpasien, b.nmkamar, ((DATEDIFF(CURDATE(), a.tglmasuk)+1) * c.tarip) AS billkamar FROM dafinap a
                            JOIN mtkamar b 
                            ON a.kdkamar = b.`kdkamar`
                            JOIN tindakan3 c
                            ON b.nomer = c.nomer
                            WHERE a.nori = $datapasien->nori"
                        );
                        $hargakamar = collect($kamar);
                    }
                    foreach ($hargakamar as $billkamar) {
                        //ambil total bill kamar misal pindah kamar per pasien
                        $pindahkamar = $connection->select("SELECT SUM(total_bill_kamar) AS jumlahtarif FROM(
                            SELECT a.nmpasien, a.kdkons, d.tarip, c.nmkamar, c.nomer, (d.tarip*b.jmlinap) AS total_bill_kamar FROM dafinap a
                            JOIN pindahkmr b
                            ON a.nori = b.nori
                            JOIN mtkamar c
                            ON b.dari = c.kdkamar
                            JOIN tindakan3kons d
                            ON c.nomer = d.nomer
                            WHERE a.nori = $datapasien->nori
                            AND d.kdkons = $datapasien->kdkons)
                            AS tb");

                        foreach ($pindahkamar as $billpindahkamar) {
                            //hitung jumlah kamar selama 1 periode rawat inap
                            $jmlbillpindahkamar = $billpindahkamar->jumlahtarif;
                            if ($jmlbillpindahkamar == null) {
                                $billingkamar = $billkamar->billkamar;
                            } else {
                                $billingkamarsekarang = $connection->select("SELECT a.nori, a.nmpasien, b.nmkamar, (DATEDIFF(CURDATE(), (SELECT tglpindah FROM pindahkmr WHERE nori = $datapasien->nori ORDER BY tglpindah DESC LIMIT 1))+1) as lamainap , ((DATEDIFF(CURDATE(), (SELECT tglpindah FROM pindahkmr WHERE nori = $datapasien->nori ORDER BY tglpindah DESC LIMIT 1))+1) * c.tarip) AS billkamar FROM dafinap a
                                                            JOIN mtkamar b 
                                                            ON a.kdkamar = b.kdkamar
                                                            JOIN tindakan3kons c
                                                            ON b.nomer = c.nomer
                                                            WHERE a.nori = $datapasien->nori
                                                            and c.kdkons = $datapasien->kdkons");
                                if ($billingkamarsekarang[0]->billkamar == null) {
                                    $billingkamarsekarang = $connection->select("SELECT a.nori, a.nmpasien, b.nmkamar, (DATEDIFF(CURDATE(), (SELECT tglpindah FROM pindahkmr WHERE nori = $datapasien->nori ORDER BY tglpindah DESC LIMIT 1))+1) as lamainap , ((DATEDIFF(CURDATE(), (SELECT tglpindah FROM pindahkmr WHERE nori = $datapasien->nori ORDER BY tglpindah DESC LIMIT 1))+1) * c.tarip) AS billkamar FROM dafinap a
                                    JOIN mtkamar b 
                                    ON a.kdkamar = b.kdkamar
                                    JOIN tindakan3 c
                                    ON b.nomer = c.nomer
                                    WHERE a.nori = $datapasien->nori");
                                }
                                $billingkamar = $billingkamarsekarang[0]->billkamar + $jmlbillpindahkamar;
                            }
                            //ambil total nilai billing saat retur obat per pasien
                            $returobat = $connection->select(
                                "SELECT SUM(jmlharga) as biaya FROM returinp
                            WHERE nori = $datapasien->nori"
                            );
                            $totalreturobat = collect($returobat);
                            foreach ($totalreturobat as $billreturobat) {
                                if ($billreturobat->biaya == null) {
                                    $biayareturobat = 0;
                                } else {
                                    $biayareturobat = $billreturobat->biaya;
                                }
                                //ambil nilai billing administrasi
                                $administrasi = $connection->select(
                                    "SELECT * from konsumen
                                WHERE kdkons = $datapasien->kdkons"
                                );
                                $adm = collect($administrasi);
                                foreach ($adm as $admin) {
                                    $billingtindakanadm = $connection->select(
                                        "SELECT SUM(ttltarip) as biltinadm FROM tin3 a
                                    JOIN tindakan3 b
                                    ON a.nomer = b.nomer
                                    WHERE a.nori = $datapasien->nori
                                    AND b.sts_adm = '1'"
                                    );
                                    foreach ($billingtindakanadm as $billadm) {
                                        $totalbilltindakan = $billtindakan->billing_tindakan;
                                        $billtindakandikenaiadm = $billadm->biltinadm;
                                        $billingfarmasi = $billingobat->billing_obat;
                                        $subtotalbilling = ($totalbilltindakan + $billingfarmasi + $billingkamar) - $biayareturobat;
                                        $subtotalbillingadm = ($billtindakandikenaiadm + $billingfarmasi + $billingkamar) - $biayareturobat;
                                        $penentuadministrasi = $admin->adminrp;
                                        if ($subtotalbillingadm > $penentuadministrasi) {
                                            $prosentasiadm = $admin->adminplus;
                                            $maxadmin = $admin->adminmax;
                                            $biayadmin = ($prosentasiadm * $subtotalbillingadm) / 100;
                                            if ($biayadmin > $maxadmin) {
                                                $admindibayar = $maxadmin;
                                            } else {
                                                $admindibayar = $biayadmin;
                                            }
                                        } else {
                                            $prosentasiadm = $admin->adminmin;
                                            $maxadmin = $admin->adminmax;
                                            $biayadmin = ($prosentasiadm * $subtotalbillingadm) / 100;
                                            if ($biayadmin > $maxadmin) {
                                                $admindibayar = $maxadmin;
                                            } else {
                                                $admindibayar = $biayadmin;
                                            }
                                        }
                                        //ambil kondisi penentu dikenai materai/tidak
                                        $penentumaterai = $admin->mtr2;
                                        if ($subtotalbilling >= $penentumaterai) {
                                            $materaidibayar = $admin->mtrplus;
                                        } else {
                                            $materaidibayar = $admin->mtrmin;
                                        }
                                        //total billing final
                                        $totalbillingdibayar = $subtotalbilling +  $admindibayar + $materaidibayar;
                                        //ambil icd di simrs
                                        $icddisimrs = $connection->select(
                                            "SELECT nori, dtd1, dtd2, dtd3, dtd4, dtd5, kdicd9, kdicd91, kdicd92, kdicd93, kdicd94, kdicd95 FROM rmdtdiagnosa
                                         WHERE nori = $datapasien->nori"
                                        );
                                        $icdsimrs = collect($icddisimrs);
                                        if ($icdsimrs->isEmpty()) {
                                            $icd10_1 = ['icd10_1' => ' '];
                                            $icd10_2 = ['icd10_2' => ' '];
                                            $icd10_3 = ['icd10_3' => ' '];
                                            $icd10_4 = ['icd10_4' => ' '];
                                            $icd10_5 = ['icd10_5' => ' '];
                                            $icd9_1 = ['icd9_1' => ' '];
                                            $icd9_2 = ['icd9_2' => ' '];
                                            $icd9_3 = ['icd9_3' => ' '];
                                            $icd9_4 = ['icd9_4' => ' '];
                                            $icd9_5 = ['icd9_5' => ' '];
                                            $icd9_6 = ['icd9_6' => ' '];
                                            $code = ['code' => ' '];
                                            $plafon = ['tarif' => ' '];
                                            $persen = ['persentase' => 0];
                                            $selisih = ['selisih' => ' '];
                                            $finalpersen = ['finalpersen' => 'TIDAK DIKETAHUI'];
                                        } else {
                                            foreach ($icdsimrs as $icd) {
                                                $icd10_1 = ['icd10_1' => $icd->dtd1];
                                                $icd10_2 = ['icd10_2' => $icd->dtd2];
                                                $icd10_3 = ['icd10_3' => $icd->dtd3];
                                                $icd10_4 = ['icd10_4' => $icd->dtd4];
                                                $icd10_5 = ['icd10_5' => $icd->dtd5];
                                                $icd9_1 = ['icd9_1' => $icd->kdicd9];
                                                $icd9_2 = ['icd9_2' => $icd->kdicd91];
                                                $icd9_3 = ['icd9_3' => $icd->kdicd92];
                                                $icd9_4 = ['icd9_4' => $icd->kdicd93];
                                                $icd9_5 = ['icd9_5' => $icd->kdicd94];
                                                $icd9_6 = ['icd9_6' => $icd->kdicd95];
                                                //cocokan icd di master grouper agar dapat muncul nilai inacbg
                                                $grouper = DB::connection('mysql')->table('temp_master_code_grouper')
                                                    ->select('code_grouper_inacbg', 'kls_rwt', 'tarif_inacbg')
                                                    ->where('kls_rwt', '=', $datapasien->jthkelas[3])
                                                    ->where('icd10_1', '=', $icd10_1)
                                                    ->where('icd10_2', '=', $icd10_2)
                                                    ->where('icd10_3', '=', $icd10_3)
                                                    ->where('icd10_4', '=', $icd10_4)
                                                    ->where('icd10_5', '=', $icd10_5)
                                                    ->where('icd9_1', '=', $icd9_1)
                                                    ->where('icd9_2', '=', $icd9_2)
                                                    ->where('icd9_3', '=', $icd9_3)
                                                    ->where('icd9_4', '=', $icd9_4)
                                                    ->where('icd9_5', '=', $icd9_5)
                                                    ->where('icd9_6', '=', $icd9_6)
                                                    ->get();

                                                if ($grouper->isNotEmpty()) {
                                                    $codegrouper = $grouper[0]->code_grouper_inacbg;
                                                    $code = ['code' => $grouper[0]->code_grouper_inacbg];
                                                    $plafon = ['tarif' => $grouper[0]->tarif_inacbg];
                                                    $a = $plafon['tarif'];
                                                    $b = (int)$totalbillingdibayar;
                                                    if (is_numeric($a) && is_numeric($b)) {
                                                        $c = (($b) / $a) * 100;
                                                        $persen = ['persentase' => $persentase = number_format($c, 2, '.', '')];
                                                        $d = $a - $b;
                                                        if ($persen['persentase'] < 75) {
                                                            $finalpersen = ['finalpersen' => 'BAIK'];
                                                            // return $finalpersen;
                                                        } else if ($persen['persentase'] >= 75 && $persen['persentase'] <= 85) {
                                                            $finalpersen = ['finalpersen' => 'AWAS'];
                                                            // return $finalpersen;
                                                        } else if ($persen['persentase'] > 85 && $persen['persentase'] > 100) {
                                                            $finalpersen = ['finalpersen' => 'DANGER / OVER'];
                                                            // return $finalpersen;
                                                        }
                                                        if ($d > 0) {
                                                            $selisih = ['selisih' => $d];
                                                        } else {
                                                            $selisih = ['selisih' => 'OVER!'];
                                                            // return $selisih;
                                                        }
                                                    }
                                                } else {
                                                    $code = ['code' => ' '];
                                                    $plafon = ['tarif' => ' '];
                                                    $persen = ['persentase' => 0];
                                                    $selisih = ['selisih' => ' '];
                                                    $finalpersen = ['finalpersen' => 'TIDAK DIKETAHUI'];
                                                }
                                            }
                                        }

                                        array_push(
                                            $finalArray,
                                            array(
                                                'nori' => $datapasien->nori,
                                                'kode_konsumen' => $datapasien->kdkons,
                                                'nm_konsumen' => $datapasien->nmkons,
                                                'nama' => $datapasien->nmpasien,
                                                'nmdokter' => $datapasien->nmdokter,
                                                'nmahli' => $datapasien->nmahli,
                                                'kls_rwt' => $datapasien->jthkelas[3],
                                                'icd10_1' => $icd10_1['icd10_1'],
                                                'icd10_2' => $icd10_2['icd10_2'],
                                                'icd10_3' => $icd10_3['icd10_3'],
                                                'icd10_4' => $icd10_4['icd10_4'],
                                                'icd10_5' => $icd10_5['icd10_5'],
                                                'icd9_1' => $icd9_1['icd9_1'],
                                                'icd9_2' => $icd9_2['icd9_2'],
                                                'icd9_3' => $icd9_3['icd9_3'],
                                                'icd9_4' => $icd9_4['icd9_4'],
                                                'icd9_5' => $icd9_5['icd9_5'],
                                                'icd9_6' => $icd9_6['icd9_6'],
                                                'billing_tindakan' => (int)$totalbilltindakan,
                                                'billing_tindakan_adm' => (int)$billtindakandikenaiadm,
                                                'billing_obat' => (int)$billingobat->billing_obat,
                                                'billing_kamar' => (int)$billingkamar,
                                                'total_retur_obat' => (int)$biayareturobat,
                                                'sub_total_billing' => (int)$subtotalbilling,
                                                'total_administrasi' => (int)$admindibayar,
                                                'materai' => (int)$materaidibayar,
                                                'total_billing' => (int)$totalbillingdibayar,
                                                'code_grouper' => $code['code'],
                                                'tarif_inacbg' => $plafon['tarif'],
                                                'persentase' => (int)$persen['persentase'],
                                                'selisih_billing' => $selisih['selisih'],
                                                'finalpersen' => $finalpersen['finalpersen']
                                            )
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $collection = collect($finalArray);

        $color = null;
        $counted = $collection->countBy('finalpersen');
        foreach ($counted as $c => $value) {
            if ($c === 'BAIK') {
                $color = '#19dd00';
            } else if ($c === 'AWAS') {
                $color = '#f9ed09';
            } else if ($c === 'DANGER / OVER') {
                $color = '#f90000';
            } else if ($c === 'TIDAK DIKETAHUI') {
                $color = '#727272';
            }
            // dd($color);
            $dataset[] = array('value' => $value, 'kriteria' => $c, 'color' => $color);
        }
        return response()->json($dataset);
    }
    public function pilihbranch(Request $request)
    {
        $input = $request->search;

        if ($input == '') {
            $branch = DB::connection('mysql')->table('ms_unitnmu')
                ->orderBy('nmrs', 'ASC')
                ->get()->toArray();
        } else {
            $branch = DB::connection('mysql')->table('ms_unitnmu')
                ->orderBy('nmrs', 'ASC')
                ->where('kdlokasi', 'like', '%' . $input . '%')
                ->get()->toArray();
            if (empty($branch)) {
                $branch = DB::connection('mysql')->table('ms_unitnmu')
                    ->orderBy('nmrs', 'ASC')
                    ->where('nmrs', 'like', '%' . $input . '%')
                    ->get()->toArray();
            }
        }
        return response()->json($branch);
    }
    public function pilihunit(Request $request)
    {
        $kdlokasi = $request->kdlokasi;
        $unit = DB::connection('mysql')->table('ms_unitnmu')
            ->where('kdlokasi', '=', $kdlokasi)
            ->get();
        foreach ($unit as $u) {
            $dbname = $u->dbname;
            $host = $u->host;
            $username = $u->username;
            $password = $u->password;
            $port = $u->port;
        }
        $params['connection_name'] = 'onthefly';
        $params['database'] = $dbname;
        $params['driver'] = 'mysql';
        $params['host'] = $host;
        $params['username'] = $username;
        $params['password'] = $password;
        $params['port'] = $port;
        $connection = DatabaseConnection::setConnection($params);
        $dataunit = $connection->table('tindakan1')
            ->where('kode1', 'like', '03%')
            ->where('kode1', '!=', '030801')
            ->get()->toArray();

        return response()->json($dataunit);
    }
    public function notifikasi(Request $request)
    {

        // $apikey = 'b84f285e3f14ff76bae01ea48a33592e08297195';
        // $url = 'https://starsender.online/api/sendText?message=' . rawurlencode($request->message) . '&tujuan=' . rawurlencode($request->to);
        // $headers = [
        //     'apikey:' . $apikey
        // ];

        // $response = Request::withHeaders($headers)
        //     ->send('POST', $url);

        // return response()->json(['success' => true]);


        $apikey = "9f97ac7ece3662ee04de7975b1d05a7f8f047f28";
        $tujuan = $request->to; //atau $tujuan="Group Chat Name";
        $pesan = $request->message;

        $response = Http::withHeaders([
            'apikey' => $apikey,
        ])->withOptions([
            'verify' => false,
        ])->post('https://starsender.online/api/sendText', [
            'tujuan' => $tujuan,
            'message' => $pesan,
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => $response->body()], $response->status());
        }
    }
    public function datasetdiagnosa(Request $request)
    {
        $kode1 = $request->kode1;
        $kdlokasi = $request->kdlokasi;
        $role = Auth::user()->role;
        $unit = DB::connection('mysql')->table('ms_unitnmu')
            ->where('kdlokasi', '=', $kdlokasi)
            ->get();
        foreach ($unit as $u) {
            $dbname = $u->dbname;
            $host = $u->host;
            $username = $u->username;
            $password = $u->password;
            $port = $u->port;
        }
        $params['connection_name'] = 'onthefly';
        $params['database'] = $dbname;
        $params['driver'] = 'mysql';
        $params['host'] = $host;
        $params['username'] = $username;
        $params['password'] = $password;
        $params['port'] = $port;
        $connection = DatabaseConnection::setConnection($params);
        $nori = $connection->table('dafinap')
            ->whereIn('dafinap.nori', function ($query) use ($request, $kode1) {
                $query->select('nori')
                    ->from('dafinap')
                    ->join('pasien', 'dafinap.nomrm', '=', 'pasien.nomrm')
                    ->join('mtkamar', 'dafinap.kdkamar', '=', 'mtkamar.kdkamar')
                    ->join('tindakan3', 'mtkamar.nomer', '=', 'tindakan3.nomer')
                    ->join('mtdokter', 'dafinap.kddokter', '=', 'mtdokter.kddokter')
                    ->where('tindakan3.kode1', '=', $kode1)
                    ->whereBetween('dafinap.tglmasuk', [$request->tglawal, $request->tglakhir])
                    ->where('dafinap.kdjnspas', '=', '06');
            })
            ->pluck('nori')->toArray();
        $noriString = implode(',', $nori);

        $diagnosa = $connection->select(
            "SELECT a.dtd1, COUNT(a.dtd1)AS jumlah, b.nama FROM rmdtdiagnosa a
            LEFT JOIN `dataicd` b
            ON a.dtd1 = b.dtd
            WHERE nori IN ($noriString)
            GROUP BY a.dtd1 
            ORDER BY jumlah DESC
            LIMIT 10"
        );
        $datasetdiagnosa = collect($diagnosa);
        $cols = [];
        $rows = [];
        $cols[] = [
            'label' => 'Diagnosa',
            'type' => 'string'
        ];
        $cols[] = [
            'label' => 'Jumlah',
            'type' => 'number'
        ];
        foreach ($datasetdiagnosa as $row) {
            $rowData = [
                'c' => [
                    ['v' => $row->dtd1 . ' ' . $row->nama],
                    ['v' => (int)$row->jumlah],
                ]
            ];
            $rows[] = $rowData;
        }
        $json = [
            'cols' => $cols,
            'rows' => $rows
        ];
        return response()->json($json);
    }
}
