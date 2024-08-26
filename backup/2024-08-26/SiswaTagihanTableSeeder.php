<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiswaTagihanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('siswa_tagihan')->delete();
        
        \DB::table('siswa_tagihan')->insert(array (
            0 => 
            array (
                'id' => 2,
                'siswa_id' => 1,
                'tagihan_id' => 2,
                'status' => 0,
                'nominal_tagihan' => 0,
                'nominal_tagihan_terbayar' => 1000000,
                'created_at' => '2024-08-26 15:00:51',
                'updated_at' => '2024-08-26 15:00:51',
            ),
        ));
        
        
    }
}