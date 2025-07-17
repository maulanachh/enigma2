<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\support\Str; 
use App\Models\User;

class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'rafika',
                'nama' => 'Rafika Dewi Kusumaningrum',
                'role' => '3',
                'kode1' => '030301',
                'nmunit' => 'RAWAT INAP 3',
                'password' => bcrypt('123'),
                'remember_token' => Str::random(60),
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now()
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
