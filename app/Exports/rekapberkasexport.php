<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;

class rekapberkasexport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($parameter)
    {
        $this->parameter[0] = $parameter[0];
    }
 
    public function query()
    {
        $data = DB::connection('mysql')->table('tr_dataranap')
        ->select(
            'nori',
            'nomrm',
            'nmpasien',
            'nmkons',
            'noasuransi',
            'nosep',
            'res',
            'lab',
            'ro',
            'ktp',
            'kk',
            'int',
            'ic',
            'sk',
            'pmsr',
            'sep',
            'op',
            'kro',
            'jr',
            'trf',
            'date_start',
            'date_end',
            'stts_verif'

        )
        ->where('stts_verif', '=', $this->parameter[0])
        ->get();
        return $data;
    }
}
