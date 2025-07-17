<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class msuserController extends Controller
{

    public function index(Request $request)
    {
        $user = DB::connection('mysql')->table('users')
            ->orderBy('nama', 'asc')
            ->get();
        if ($request->ajax()) {
            return datatables()->of($user)->make(true);
        }
        return view('msuser');
    }
    public function edit(request $request)
    {
        $id = $request->id;
        $user = DB::connection('mysql')->table('users')
            ->where('id', '=', $id)
            ->get();

        return response()->json(['user' => $user]);
    }
    // public function selunit()
    // {
    //     $unit = DB::connection('mysql')->table('ms_unitnmu')
    //         ->orderBy('nmrs', 'ASC')
    //         ->get();
    //     return response()->json($unit);
    // }
    public function selunit(Request $request)
    {

        $input = $request->all();

        if ($input == '') {
            $unit = DB::connection('mysql')->table('ms_unitnmu')
                ->orderBy('nmrs', 'ASC')
                ->get()->toArray();;
        } else {
            $unit = DB::connection('mysql')->table('ms_unitnmu')
            ->orderBy('nmrs', 'ASC')
            ->where('nmrs', 'like', '%' . $input['term']['term'] . '%')
            ->get()->toArray();;
            // $employees = Employees::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        // $response = array();
        // foreach ($unit as $u) {
        //     $response[] = array(
        //         "id" => $u->id,
        //         "nmrs" => $u->nmrs
        //     );
        // }

        // return response()->json($response);
        return response()->json($unit);
    }
}
