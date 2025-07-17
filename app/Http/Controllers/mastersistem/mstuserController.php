<?php

namespace App\Http\Controllers\mastersistem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\DatabaseConnection;
use Illuminate\support\Str; 

class mstuserController extends Controller
{
    public function index(Request $request)
    {
        $user = DB::connection('mysql')->table('users')
            ->orderBy('id', 'ASC')
            ->get();
        if ($request->ajax()) {
            return datatables()->of($user)->make(true);
        }
        return view('mastersistem.msuser');
    }
    public function pilihrole(Request $request)
    {
        $input = $request->search;
       
        if ($input == '') {
            $role = DB::connection('mysql')->table('mst_role_user')
                ->orderBy('nm_role', 'ASC')
                ->get()->toArray();
        } else {
            $role = DB::connection('mysql')->table('mst_role_user')
                ->orderBy('nm_role', 'ASC')
                ->where('nm_role', 'like', '%' . $input . '%')
                ->get()->toArray();
            if (empty($role)) {
                $role = DB::connection('mysql')->table('mst_role_user')
                    ->orderBy('nm_role', 'ASC')
                    ->where('nm_role', 'like', '%' . $input . '%')
                    ->get()->toArray();
            }
        }
        return response()->json($role);
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
        ->get()->toArray();
        
        return response()->json($dataunit);
    }
    public function adduser(request $request)
    {
        $user = DB::connection('mysql')->table('users')->insert(
            [
                'username' => $request->username,
                'nama' => $request->nama,
                'role' => $request->role,
                'kode1' => $request->kode1,
                'kdlokasi' => $request->kdlokasi,
                'nmrs' => $request->nmrs,
                'nmunit' => $request->nmunit,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now()
            ]
        );
        if ($user) {
            return response($user, 200);
        } else {
            return response("Data Gagal Disimpan");
        }
    }
    public function parsingdatauser(request $request)
    {
        $id = $request->id;
        $kode1 = Auth::user()->kode1;
        $kdlokasi = Auth::user()->kdlokasi;
        $getuser = DB::connection('mysql')->table('users')
            ->where('id', '=', $id)
            ->get();
        return response()->json(['getuser' => $getuser]);
    }
    public function updateuser(request $request)
    {
        $id = $request->id;
        $updateuser = DB::connection('mysql')->table('users')->where('id', '=', $id)->update(
            [
                'username' => $request->username,
                'nama' => $request->nama,
                'role' => $request->role,
                'kode1' => $request->kode1,
                'kdlokasi' => $request->kdlokasi,
                'nmrs' => $request->nmrs,
                'nmunit' => $request->nmunit,
                'password' => bcrypt($request->password),
                'updated_at' =>  Carbon::now()
            ]
        );
        if ($updateuser) {
            return response($updateuser, 200);
        } else {
            return response("Data Gagal Diupdate");
        }
    }
    public function deleteuser(request $request)
    {
        $id = $request->id;
        $deluser = DB::connection('mysql')->table('users')->where('id', '=', $id)->delete();
        if ($deluser) {
            return response($deluser, 200);
        } else {
            return response("Data Gagal Dihapus");
        }
    }
}
