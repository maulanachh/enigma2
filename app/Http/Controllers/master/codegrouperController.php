<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class codegrouperController extends Controller
{
    public function index(Request $request)
    {
        $datacodegrouper = DB::connection('mysql')->table('temp_master_code_grouper')
            ->orderBy('id', 'ASC')
            ->get();
        if ($request->ajax()) {
            return datatables()->of($datacodegrouper)->make(true);
        }
        return view('master.ms_code_grouper');
    }
    public function selicd10(Request $request)
    {

        $input = $request->search;

        if ($input == '') {
            $unit = DB::connection('mysql')->table('dataicd')
                ->orderBy('nama', 'ASC')
                ->get()->toArray();
        } else {
            $unit = DB::connection('mysql')->table('dataicd')
                ->orderBy('nama', 'ASC')
                ->where('nama', 'like', '%' . $input . '%')
                ->get()->toArray();
            if (empty($unit)) {
                $unit = DB::connection('mysql')->table('dataicd')
                    ->orderBy('nama', 'ASC')
                    ->where('dtd', 'like', '%' . $input . '%')
                    ->get()->toArray();
            }
        }
        return response()->json($unit);
    }
    public function selicd9(Request $request)
    {
        $input = $request->search;
        if ($input == '') {
            $unit = DB::connection('mysql')->table('dataicd9')
                ->orderBy('nmicd9', 'ASC')
                ->get()->toArray();
        } else {
            $unit = DB::connection('mysql')->table('dataicd9')
                ->orderBy('nmicd9', 'ASC')
                ->where('nmicd9', 'like', '%' . $input . '%')
                ->get()->toArray();
            if (empty($unit)) {
                $unit = DB::connection('mysql')->table('dataicd9')
                    ->orderBy('nmicd9', 'ASC')
                    ->where('kdicd9', 'like', '%' . $input . '%')
                    ->get()->toArray();
            }
        }
        return response()->json($unit);
    }
    public function kls_rwt()
    {
        $kls_rwt = DB::connection('mysql')->table('ms_kls_rwt')
            ->orderBy('kls_rwt', 'ASC')
            ->get();
        return response()->json($kls_rwt);
        // dd($kls_rwt);
    }
    public function savegrouper(request $request)
    {
        $grouper = DB::connection('mysql')->table('temp_master_code_grouper')->insert(
            [
                'icd10_1' => $request->icd10_1,
                'icd10_2' => $request->icd10_2,
                'icd10_3' => $request->icd10_3,
                'icd10_4' => $request->icd10_4,
                'icd10_5' => $request->icd10_5,
                'icd10_6' => $request->icd10_6,
                'icd9_1' => $request->icd9_1,
                'icd9_2' => $request->icd9_2,
                'icd9_3' => $request->icd9_3,
                'icd9_4' => $request->icd9_4,
                'icd9_5' => $request->icd9_5,
                'icd9_6' => $request->icd9_6,
                'kls_rwt' => $request->kls_rwt,
                'code_grouper_inacbg' => $request->code_grouper_inacbg,
                'tarif_inacbg' => $request->tarif_inacbg,
                'deskripsi_inacbg' => $request->deskripsi_inacbg
            ]
        );
        if ($grouper) {
            return response($grouper, 200);
        } else {
            return response("Data Gagal Disimpan");
        }
    }
    public function parsingdatagrouper(request $request)
    {
        $id = $request->id;
        $kode1 = Auth::user()->kode1;
        $kdlokasi = Auth::user()->kdlokasi;
        $codegrouper = DB::connection('mysql')->table('temp_master_code_grouper')
            ->where('id', '=', $id)
            ->get();
        return response()->json(['codegrouper' => $codegrouper]);
    }
    public function updatedatamaster(request $request)
    {
        $id = $request->idgrouper;
        $grouper = DB::connection('mysql')->table('temp_master_code_grouper')->where('id', '=', $id)->update(
            [
                'icd10_1' => $request->icd10_1,
                'icd10_2' => $request->icd10_2,
                'icd10_3' => $request->icd10_3,
                'icd10_4' => $request->icd10_4,
                'icd10_5' => $request->icd10_5,
                'icd10_6' => $request->icd10_6,
                'icd9_1' => $request->icd9_1,
                'icd9_2' => $request->icd9_2,
                'icd9_3' => $request->icd9_3,
                'icd9_4' => $request->icd9_4,
                'icd9_5' => $request->icd9_5,
                'icd9_6' => $request->icd9_6,
                'kls_rwt' => $request->kls_rwt,
                'code_grouper_inacbg' => $request->code_grouper_inacbg,
                'tarif_inacbg' => $request->tarif_inacbg,
                'deskripsi_inacbg' => $request->deskripsi_inacbg
            ]
        );
        if ($grouper) {
            return response($grouper, 200);
        } else {
            return response("Data Gagal Diupdate");
        }
    }
    public function deletecodegrouper(request $request)
    {
        $id = $request->id;
        $delcodegrouper = DB::connection('mysql')->table('temp_master_code_grouper')->where('id', '=', $id)->delete();
        if ($delcodegrouper) {
            return response($delcodegrouper, 200);
        } else {
            return response("Data Gagal Dihapus");
        }
    }
}
