<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class selisihbillingController extends Controller
{
    public function index (){
        return view ('layout.master');
    }
    public function menukasir (){
        return view ('kasir.selisihbilling');
    }
    public function dataset(Request $request){
        
    }
}
