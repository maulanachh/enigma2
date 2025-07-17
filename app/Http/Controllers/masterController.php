<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class masterController extends Controller
{
    public function index(Request $request)
    {
        $unit = DB::connection('mysql')->table('ms_unitnmu')
            ->orderBy('nmrs', 'asc')
            ->get();
        if ($request->ajax()) {
            return datatables()->of($unit)->make(true);
        }
        return view('msunit');
    }
    public function edit(request $request)
    {
        $id = $request->id;
        $unit = DB::connection('mysql')->table('ms_unitnmu')
            ->where('id', '=', $id)
            ->get();

        return response()->json(['unit' => $unit]);
    }
    public function add(request $request)
    {
        $unit = DB::connection('mysql')->table('ms_unitnmu')->insert(
            [
                'kdlokasi' => $request->kdlokasi,
                'nmrs' => $request->nmunit,
                'dbname' => $request->nmdb,
                'host' => $request->hostdb,
                'username' => $request->userdb,
                'password' => $request->pasdb,
                'port' => $request->portdb,
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now()
            ]
        );
        if ($unit) {
            return response($unit, 200);
        } else {
            return response("Data Gagal Disimpan");
        }
    }
    public function update(request $request)
    {
        $id = $request->id;
        $unit = DB::connection('mysql')->table('ms_unitnmu')->where('id', '=', $id)->update(
            [
                'kdlokasi' => $request->kdlokasi,
                'nmrs' => $request->nmunit,
                'dbname' => $request->nmdb,
                'host' => $request->hostdb,
                'username' => $request->userdb,
                'password' => $request->pasdb,
                'port' => $request->portdb,
                'updated_at' =>  Carbon::now()
            ]
        );
        if ($unit) {
            return response($unit, 200);
        } else {
            return response("Data Gagal Diupdate");
        }
    }
    public function delete(request $request)
    {
        $id = $request->id;
        $unit = DB::connection('mysql')->table('ms_unitnmu')->where('id', '=', $id)->delete();
        if ($unit) {
            return response($unit, 200);
        } else {
            return response("Data Gagal Dihapus");
        }
    }
}
