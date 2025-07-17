<?php

namespace App\Http\Controllers\casemix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\DatabaseConnection;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;

class cmlistbillingController extends Controller
{
    public function index()
    {
        return view('casemix.list_billing');
    }
    public function pilihunit(Request $request)
    {
        $input = $request->search;
        $kdlokasi = Auth::user()->kdlokasi;;
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
        if ($input == '') {
            $dataunit = $connection->table('tindakan1')
                ->where('kode1', 'like', '030%')
                ->get()->toArray();
        } else {
            $dataunit = $connection->table('tindakan1')->where('nama', 'like', '%' . $input . '%')->where('kode1', 'like', '030%')->get()->toArray();
            if (empty($dataunit)) {
                $dataunit = $connection->table('tindakan1')->where('kode1', 'like', '%' . $input . '%')->where('kode1', 'like', '030%')->get()->toArray();
            }
        }
        return response()->json($dataunit);
    }
    public function datatable(Request $request)
    {
        $kode1 = $request->kode1;
        $kdlokasi = Auth::user()->kdlokasi;
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
            $tindakan = $connection->select(
                "SELECT SUM(ttltarip) as billing_tindakan FROM tin3 where nori = $datapasien->nori group by nori"
            );
            $totalbilltindakan = collect($tindakan);
            foreach ($totalbilltindakan as $billtindakan) {
                $obat = $connection->select(
                    "SELECT SUM(jmlditanggung) as billing_obat FROM jualop2 where nori = $datapasien->nori group by nori"
                );
                $totalbillobat = collect($obat);
                foreach ($totalbillobat as $billingobat) {
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
                                        $penentumaterai = $admin->mtr2;
                                        if ($subtotalbilling >= $penentumaterai) {
                                            $materaidibayar = $admin->mtrplus;
                                        } else {
                                            $materaidibayar = $admin->mtrmin;
                                        }
                                        $totalbillingdibayar = $subtotalbilling +  $admindibayar + $materaidibayar;

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
                                                        if ($d > 0) {
                                                            $selisih = ['selisih' => $d];
                                                            // return $selisih;
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
                                                }
                                            }
                                        }
                                        $tglskg = Carbon::now();
                                        $tgllahir = Carbon::createFromFormat('Y-m-d', $datapasien->tgllahir);
                                        $diff = $tglskg->diff($tgllahir);
                                        $tahun = $diff->y;
                                        $bulan = $diff->m;
                                        $hari = $diff->d;
                                        if ($tahun < 1) {
                                            if ($bulan < 1) {
                                                $golumur = DB::connection('mysql')->table('mst_golumur')
                                                    ->where('jenis_golongan', '=', 'day')
                                                    ->first();
                                                $katumur = $golumur->nama_golongan;
                                                // Umur dalam hitungan hari
                                                $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
                                            } else {
                                                $golumur = DB::connection('mysql')->table('mst_golumur')
                                                    ->where('jenis_golongan', '=', 'bulan')
                                                    ->first();
                                                $katumur = $golumur->nama_golongan;
                                                // Umur dalam hitungan bulan
                                                $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
                                            }
                                        } else if ($tahun < 65) {
                                            $golumur = DB::connection('mysql')->table('mst_golumur')
                                                ->where('jenis_golongan', '=', 'tahun')
                                                ->where('min_golongan', '<=', $tahun)
                                                ->where('max_golongan', '>=', $tahun)
                                                ->first();
                                            $katumur = $golumur->nama_golongan;

                                            $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
                                        } else {
                                            $golumur = DB::connection('mysql')->table('mst_golumur')
                                                ->where('jenis_golongan', '=', 'tahun')
                                                ->where('min_golongan', '<=', $tahun)
                                                ->where('max_golongan', '=', null)
                                                ->first();
                                            $katumur = $golumur->nama_golongan;
                                            $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
                                        }
                                        $cekdatainsert = DB::connection('mysql')->table('tr_billing')->where('nori', '=', $datapasien->nori)->first();
                                        if ($cekdatainsert == null) {
                                            $insertdatabilling = DB::connection('mysql')->table('tr_billing')->insert(
                                                [
                                                    'kdlokasi' => Auth::user()->kdlokasi,
                                                    'kode1' => $kode1,
                                                    'nori' => $datapasien->nori,
                                                    'tgllahir' => $datapasien->tgllahir,
                                                    'kdkons' => $datapasien->kdkons,
                                                    'nmkons' => $datapasien->nmkons,
                                                    'nama' => $datapasien->nmpasien,
                                                    'umur' => $umur,
                                                    'golongan_umur' => $katumur,
                                                    'kddokter' => $datapasien->kddokter,
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
                                                    'created_by' =>  'ENIGMA',
                                                    'created_at' =>  Carbon::now()
                                                ]
                                            );
                                        } else {
                                            $updatedatabilling = DB::connection('mysql')->table('tr_billing')->where('nori', '=', $datapasien->nori)->where('kdlokasi', '=', Auth::user()->kdlokasi)->where('kode1', '=', Auth::user()->kode1)->update(
                                                [
                                                    'kdlokasi' => Auth::user()->kdlokasi,
                                                    'kode1' => $kode1,
                                                    'kdkons' => $datapasien->kdkons,
                                                    'nmkons' => $datapasien->nmkons,
                                                    'tgllahir' => $datapasien->tgllahir,
                                                    'nama' => $datapasien->nmpasien,
                                                    'umur' => $umur,
                                                    'golongan_umur' => $katumur,
                                                    'kddokter' => $datapasien->kddokter,
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
                                                    'selisih_billing' => $selisih['selisih']
                                                ]
                                            );
                                        }
                                        array_push(
                                            $finalArray,
                                            array(
                                                'nori' => $datapasien->nori,
                                                'kode_konsumen' => $datapasien->kdkons,
                                                'nm_konsumen' => $datapasien->nmkons,
                                                'nama' => $datapasien->nmpasien,
                                                'umur' => $umur,
                                                'gol_umur' => $katumur,
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
                                                'selisih_billing' => $selisih['selisih']
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
        if ($request->ajax()) {
            return datatables()->of($finalArray)->make(true);
        }
    }
    public function parsingdatapasbil(request $request)
    {
        $nori = $request->nori;
        $kdlokasi = Auth::user()->kdlokasi;
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
        $parsedata = $connection->table('dafinap')
            ->select(
                'dafinap.nori',
                'dafinap.nomrm',
                'dafinap.nmpasien',
                'dtd1 AS icd10_1',
                'dtd2 AS icd10_2',
                'dtd3 AS icd10_3',
                'dtd4 AS icd10_4',
                'dtd5 AS icd10_5',
                'kdicd9 AS icd9_1',
                'kdicd91 AS icd9_2',
                'kdicd92 AS icd9_3',
                'kdicd93 AS icd9_4',
                'kdicd94 AS icd9_5',
                'kdicd95 AS icd9_6',
                'rmdtdiagnosa.kasus',
                'rmdtdiagnosa.kunjung'
            )
            ->join('rmdtdiagnosa', 'dafinap.nori', '=', 'rmdtdiagnosa.nori')
            ->where('dafinap.nori', '=', $nori)
            ->get();
        if ($parsedata->isnotEmpty()) {
            $kasus = DB::connection('mysql')->table('mst_kriteria_kunj')
                ->where('kriteria_kunj', 'like', '%' . $parsedata[0]->kasus . '%')
                ->first();
            $kunjung = DB::connection('mysql')->table('mst_kriteria_kunj')
                ->where('kriteria_kunj', 'like', '%' . $parsedata[0]->kunjung . '%')
                ->first();
            $parsedatapasbil[] = [
                'nori' => $parsedata[0]->nori,
                'nmpasien' => $parsedata[0]->nmpasien,
                'nomrm' => $parsedata[0]->nomrm,
                'icd10_1' => $parsedata[0]->icd10_1,
                'icd10_2' => $parsedata[0]->icd10_2,
                'icd10_3' => $parsedata[0]->icd10_3,
                'icd10_4' => $parsedata[0]->icd10_4,
                'icd10_5' => $parsedata[0]->icd10_5,
                'icd9_1' => $parsedata[0]->icd9_1,
                'icd9_2' => $parsedata[0]->icd9_2,
                'icd9_3' => $parsedata[0]->icd9_3,
                'icd9_4' => $parsedata[0]->icd9_4,
                'icd9_5' => $parsedata[0]->icd9_5,
                'icd9_6' => $parsedata[0]->icd9_6,
                'kasus' => $kasus->kriteria_kunj,
                'kunjung' => $kunjung->kriteria_kunj
            ];
        } else {
            $parsedata = $connection->table('dafinap')
                ->select(
                    'dafinap.nori',
                    'dafinap.nomrm',
                    'dafinap.nmpasien'
                )
                ->where('dafinap.nori', '=', $nori)
                ->get();
            $parsedatapasbil[] = [
                'nori' => $parsedata[0]->nori,
                'nmpasien' => $parsedata[0]->nmpasien,
                'nomrm' => $parsedata[0]->nomrm,
                'icd10_1' => 'kosong',
                'icd10_2' => 'kosong',
                'icd10_3' => 'kosong',
                'icd10_4' => 'kosong',
                'icd10_5' => 'kosong',
                'icd9_1' => 'kosong',
                'icd9_2' => 'kosong',
                'icd9_3' => 'kosong',
                'icd9_4' => 'kosong',
                'icd9_5' => 'kosong',
                'icd9_6' => 'kosong',
                'kasus' => 'kosong',
                'kunjung' => 'kosong'
            ];
        }
        return response()->json(['parsedatapasbil' => $parsedatapasbil]);
    }
    public function updateina(request $request)
    {
        $nori = $request->nori;
        $kode1 = $request->kode1;
        $kdlokasi = Auth::user()->kdlokasi;
        $usernameinput =Auth::user()->username;
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
        $getnamaicd9 =  $connection->table('dataicd9')
            ->select(
                [
                    'kdicd9', 'nmicd9'
                ]
            )
            ->where('kdicd9', '=', $request->icd9_1)
            ->first();
        if ($getnamaicd9 == null) {
            $namaicd9 = '';
        } else {
            $namaicd9 = $getnamaicd9->nmicd9;
        }
        $updateina = $connection->table('rmdtdiagnosa')->where('nori', '=', $nori)->update(
            [
                'dtd1' => $request->icd10_1,
                'dtd2' => $request->icd10_2,
                'dtd3' => $request->icd10_3,
                'dtd4' => $request->icd10_4,
                'dtd5' => $request->icd10_5,
                'kdicd9' => $request->icd9_1,
                'nmicd9' => $namaicd9,
                'kdicd91' => $request->icd9_2,
                'kdicd92' => $request->icd9_3,
                'kdicd93' => $request->icd9_4,
                'kdicd94' => $request->icd9_5,
                'kdicd95' => $request->icd9_6
            ]
        );
        if ($updateina) {
            $updatedatatrbilling = DB::connection('mysql')->table('tr_billing')->where('nori', '=', $nori)->where('kdlokasi', '=', Auth::user()->kdlokasi)->where('kode1', '=', $kode1)->update(
                [
                    'kode1' => $kode1,
                    'icd10_1' => $request->icd10_1,
                    'icd10_2' => $request->icd10_2,
                    'icd10_3' => $request->icd10_3,
                    'icd10_4' => $request->icd10_4,
                    'icd10_5' => $request->icd10_5,
                    'icd9_1' => $request->icd9_1,
                    'icd9_2' => $request->icd9_2,
                    'icd9_3' => $request->icd9_3,
                    'icd9_4' => $request->icd9_4,
                    'icd9_5' => $request->icd9_5,
                    'icd9_6' => $request->icd9_6,
                    'updated_by' =>  $usernameinput,
                    'updated_at' =>  Carbon::now()
                ]
            );
            if ($updatedatatrbilling) {
                $pasranap = $connection->table('dafinap')
                    ->select(
                        [
                            'dafinap.nori', 'dafinap.nomrm', 'dafinap.nmpasien', 'dafinap.kddokter', 'mtdokter.kddokter', 'mtdokter.nmdokter', 'mtdokter.nmahli', 'tglmasuk',
                            'dafinap.kdkons', 'dafinap.nmkons', 'dafinap.noasuransi', 'nosep', 'jthkelas', 'tgllahir', 'pasien.kdkec', 'pasien.kdkab', 'dafinap.norj', 'pasien.kelamin', 'dafinap.asal'
                        ]
                    )
                    ->join('pasien', 'dafinap.nomrm', '=', 'pasien.nomrm')
                    ->join('mtkamar', 'dafinap.kdkamar', '=', 'mtkamar.kdkamar')
                    ->join('tindakan3', 'mtkamar.nomer', '=', 'tindakan3.nomer')
                    ->join('mtdokter', 'dafinap.kddokter', '=', 'mtdokter.kddokter')
                    ->where('dafinap.nori', '=', $nori)
                    ->first();
                $insertdatalog = DB::connection('mysql')->table('log_intervensi_billing')->insert(
                    [
                        'kode1' => $kode1,
                        'kdlokasi' => Auth::user()->kdlokasi,
                        'nori' => $pasranap->nori,
                        'tgllahir' => $pasranap->tgllahir,
                        'kdkons' => $pasranap->kdkons,
                        'nmkons' => $pasranap->nmkons,
                        'nama' => $pasranap->nmpasien,
                        'kddokter' => $pasranap->kddokter,
                        'nmdokter' => $pasranap->nmdokter,
                        'nmahli' => $pasranap->nmahli,
                        'kls_rwt' => $pasranap->jthkelas[3],
                        'icd10_1' => $request->icd10_1,
                        'icd10_2' => $request->icd10_2,
                        'icd10_3' => $request->icd10_3,
                        'icd10_4' => $request->icd10_4,
                        'icd10_5' => $request->icd10_5,
                        'icd9_1' => $request->icd9_1,
                        'icd9_2' => $request->icd9_2,
                        'icd9_3' => $request->icd9_3,
                        'icd9_4' => $request->icd9_4,
                        'icd9_5' => $request->icd9_5,
                        'icd9_6' => $request->icd9_6,
                        'created_by' =>  Auth::user()->username,
                        'role_user' =>  Auth::user()->role,
                        'created_at' =>  Carbon::now()
                    ]
                );
                if ($insertdatalog) {
                    return response($insertdatalog, 200);
                }
            }
        } else {
            return response("Data Gagal Diupdate");
        }
    }
    public function insertina(request $request)
    {
        $nori = $request->nori;
        $kdlokasi = Auth::user()->kdlokasi;
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
                    'dafinap.kdkons', 'dafinap.nmkons', 'dafinap.noasuransi', 'nosep', 'jthkelas', 'tgllahir', 'pasien.kdkec', 'pasien.kdkab', 'dafinap.norj', 'pasien.kelamin', 'dafinap.asal'
                ]
            )
            ->join('pasien', 'dafinap.nomrm', '=', 'pasien.nomrm')
            ->join('mtkamar', 'dafinap.kdkamar', '=', 'mtkamar.kdkamar')
            ->join('tindakan3', 'mtkamar.nomer', '=', 'tindakan3.nomer')
            ->join('mtdokter', 'dafinap.kddokter', '=', 'mtdokter.kddokter')
            ->where('dafinap.nori', '=', $nori)
            ->first();
        $getnamaicd9 =  $connection->table('dataicd9')
            ->select(
                [
                    'kdicd9', 'nmicd9'
                ]
            )
            ->where('kdicd9', '=', $request->icd9_1)
            ->first();
        if ($getnamaicd9 == null) {
            $namaicd9 = '';
        } else {
            $namaicd9 = $getnamaicd9->nmicd9;
        }
        $tglskg = Carbon::now();
        $tgllahir = Carbon::createFromFormat('Y-m-d', $pasranap->tgllahir);
        $diff = $tglskg->diff($tgllahir);
        $tahun = $diff->y;
        $bulan = $diff->m;
        $hari = $diff->d;
        if ($tahun < 1) {
            if ($bulan < 1) {
                $golumur = DB::connection('mysql')->table('mst_golumur')
                    ->where('jenis_golongan', '=', 'day')
                    ->first();
                $katumur = $golumur->nama_golongan;
                // Umur dalam hitungan hari
                $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
            } else {
                $golumur = DB::connection('mysql')->table('mst_golumur')
                    ->where('jenis_golongan', '=', 'bulan')
                    ->first();
                $katumur = $golumur->nama_golongan;
                // Umur dalam hitungan bulan
                $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
            }
        } else if ($tahun < 65) {
            $golumur = DB::connection('mysql')->table('mst_golumur')
                ->where('jenis_golongan', '=', 'tahun')
                ->where('min_golongan', '<=', $tahun)
                ->where('max_golongan', '>=', $tahun)
                ->first();
            $katumur = $golumur->nama_golongan;

            $umur = $tahun . " tahun " . +$bulan . " bulan " . +$hari . " hari ";
        } else {
            $golumur = DB::connection('mysql')->table('mst_golumur')
                ->where('jenis_golongan', '=', 'tahun')
                ->where('min_golongan', '<=', $tahun)
                ->where('max_golongan', '=', null)
                ->first();
            $katumur = $golumur->nama_golongan;
        }
        $insertina = $connection->table('rmdtdiagnosa')->where('nori', '=', $nori)->insert(
            [
                'kdpetugas' => 'ENIGMA',
                'nomer' => 0,
                'tanggal' => Carbon::now(),
                'nomrm' => $pasranap->nomrm,
                'kdkec' => $pasranap->kdkec,
                'kdkab' => $pasranap->kdkab,
                'golumur' => $katumur,
                'byberat' => 0,
                'noid' => 1,
                'dtd1' => $request->icd10_1,
                'dtd2' => $request->icd10_2,
                'dtd3' => $request->icd10_3,
                'dtd4' => $request->icd10_4,
                'dtd5' => $request->icd10_5,
                'jml' => 1,
                'kasus' => $request->kasus[0],
                'kunjung' => $request->kunjung[0],
                'stspasien' => 'RI',
                'nopaslama' => 0,
                'norj' => 0,
                'nori' => $nori,
                'kelamin' => $pasranap->kelamin[0],
                'kondisi' => 'HIDUP',
                'kddokter1' => $pasranap->kddokter,
                'nmdokter1' => $pasranap->nmdokter,
                'asalpasien' => $pasranap->asal,
                'kdicd9' => $request->icd9_1,
                'nmicd9' => $namaicd9,
                'kdicd91' => $request->icd9_2,
                'kdicd92' => $request->icd9_3,
                'kdicd93' => $request->icd9_4,
                'kdicd94' => $request->icd9_5,
                'kdicd95' => $request->icd9_6
            ]
        );
        if ($insertina) {
            $updatedatabilling = DB::connection('mysql')->table('tr_billing')->where('nori', '=', $nori)->where('kdlokasi', '=', Auth::user()->kdlokasi)->where('kode1', '=', $kode1)->update(
                [
                    'kdlokasi' => Auth::user()->kdlokasi,
                    'kode1' => $kode1,
                    'icd10_1' => $request->icd10_1,
                    'icd10_2' => $request->icd10_2,
                    'icd10_3' => $request->icd10_3,
                    'icd10_4' => $request->icd10_4,
                    'icd10_5' => $request->icd10_5,
                    'icd9_1' => $request->icd9_1,
                    'icd9_2' => $request->icd9_2,
                    'icd9_3' => $request->icd9_3,
                    'icd9_4' => $request->icd9_4,
                    'icd9_5' => $request->icd9_5,
                    'icd9_6' => $request->icd9_6,
                    'updated_by' =>  Auth::user()->username,
                    'updated_at' =>  Carbon::now(),
                ]
            );
            if ($updatedatabilling) {
                $pasranap = $connection->table('dafinap')
                    ->select(
                        [
                            'dafinap.nori', 'dafinap.nomrm', 'dafinap.nmpasien', 'dafinap.kddokter', 'mtdokter.kddokter', 'mtdokter.nmdokter', 'mtdokter.nmahli', 'tglmasuk',
                            'dafinap.kdkons', 'dafinap.nmkons', 'dafinap.noasuransi', 'nosep', 'jthkelas', 'tgllahir', 'pasien.kdkec', 'pasien.kdkab', 'dafinap.norj', 'pasien.kelamin', 'dafinap.asal'
                        ]
                    )
                    ->join('pasien', 'dafinap.nomrm', '=', 'pasien.nomrm')
                    ->join('mtkamar', 'dafinap.kdkamar', '=', 'mtkamar.kdkamar')
                    ->join('tindakan3', 'mtkamar.nomer', '=', 'tindakan3.nomer')
                    ->join('mtdokter', 'dafinap.kddokter', '=', 'mtdokter.kddokter')
                    ->where('dafinap.nori', '=', $nori)
                    ->first();
                $insertdatalog = DB::connection('mysql')->table('log_intervensi_billing')->insert(
                    [
                        'kode1' => $kode1,
                        'kdlokasi' => Auth::user()->kdlokasi,
                        'nori' => $pasranap->nori,
                        'tgllahir' => $pasranap->tgllahir,
                        'kdkons' => $pasranap->kdkons,
                        'nmkons' => $pasranap->nmkons,
                        'nama' => $pasranap->nmpasien,
                        'kddokter' => $pasranap->kddokter,
                        'nmdokter' => $pasranap->nmdokter,
                        'nmahli' => $pasranap->nmahli,
                        'kls_rwt' => $pasranap->jthkelas[3],
                        'icd10_1' => $request->icd10_1,
                        'icd10_2' => $request->icd10_2,
                        'icd10_3' => $request->icd10_3,
                        'icd10_4' => $request->icd10_4,
                        'icd10_5' => $request->icd10_5,
                        'icd9_1' => $request->icd9_1,
                        'icd9_2' => $request->icd9_2,
                        'icd9_3' => $request->icd9_3,
                        'icd9_4' => $request->icd9_4,
                        'icd9_5' => $request->icd9_5,
                        'icd9_6' => $request->icd9_6,
                        'created_by' =>  Auth::user()->username,
                        'role_user' =>  Auth::user()->role,
                        'created_at' =>  Carbon::now()
                    ]
                );
                if ($insertdatalog) {
                    return response($updatedatabilling, 200);
                }
            }
        } else {
            return response("Data Gagal Diupdate");
        }
    }
    public function selkriteriakunj(Request $request)
    {
        $input = $request->search;

        if ($input == '') {
            $unit = DB::connection('mysql')->table('mst_kriteria_kunj')
                ->orderBy('kriteria_kunj', 'ASC')
                ->get()->toArray();
        } else {
            $unit = DB::connection('mysql')->table('mst_kriteria_kunj')
                ->orderBy('kriteria_kunj', 'ASC')
                ->where('kriteria_kunj', 'like', '%' . $input . '%')
                ->get()->toArray();
        }
        return response()->json($unit);
    }
}
