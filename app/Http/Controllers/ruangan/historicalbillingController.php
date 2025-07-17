<?php

namespace App\Http\Controllers\ruangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\DatabaseConnection;

class historicalbillingController extends Controller
{
    public function index(Request $request)
    {
        return view('ruangan.historicalbilling');
    }
    public function dataset(Request $request)
    {   
        $kode1 = Auth::user()->kode1;
        $kdlokasi = Auth::user()->kdlokasi;
        $datahistorical = DB::connection('mysql')->table('tr_billing')
            ->select('nori')
            ->where('kdlokasi', $kdlokasi)
            ->where('kode1', $kode1)
            ->where('tglkeluar', 0000 - 00 - 00)
            ->get();
    }
}
