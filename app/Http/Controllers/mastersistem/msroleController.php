<?php

namespace App\Http\Controllers\mastersistem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class msroleController extends Controller
{
    public function index(Request $request)
    {
        $roleuser = DB::connection('mysql')->table('mst_role_user')
            ->orderBy('id', 'ASC')
            ->get();
        if ($request->ajax()) {
            return datatables()->of($roleuser)->make(true);
        }
        return view('mastersistem.msrole');
    }
    public function add(request $request)
    {   
        $username = Auth::user()->username;
        $addrole = DB::connection('mysql')->table('mst_role_user')->insert(
            [
                'id' => $request->id,
                'nm_role' => $request->nmrole,
                'created_by' => $username,
                'created_at' => Carbon::now()
            ]
        );
        if ($addrole) {
            return response($addrole, 200);
        } else {
            return response("Data Gagal Disimpan");
        }
    }
    public function parsingdata(request $request)
    {   
        $id = $request->id;
        $role = DB::connection('mysql')->table('mst_role_user')
        ->where('id', '=', $id)
        ->get();
    return response()->json(['role' => $role]);
    }
    public function updaterole(request $request)
    {   
        $id = $request->id;
        $username = Auth::user()->username;
        $updaterole = DB::connection('mysql')->table('mst_role_user')->where('id', '=', $id)->update(
            [
                'id' => $id,
                'nm_role' => $request->nmrole,
                'updated_by' =>  $username,
                'updated_at' =>  Carbon::now()
            ]
        );
        if($updaterole){
            return response($updaterole, 200);
        }
        else{
            return response("Data Gagal Disimpan");
        }
    }
    public function deleterole(request $request)
    {
        $id = $request->id;
        $delrole = DB::connection('mysql')->table('mst_role_user')->where('id', '=', $id)->delete();
        if ($delrole) {
            return response($delrole, 200);
        } else {
            return response("Data Gagal Dihapus");
        }
    }
}
