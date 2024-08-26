<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('histories')->delete();
        
        \DB::table('histories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nominal' => 10000,
                'tanggal_transaksi' => '2024-08-25 18:06:10',
                'siswa_id' => 1,
                'tagihan_id' => 2,
                'siswa_tagihan_id' => 32,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-08-25 18:06:10',
                'updated_at' => '2024-08-25 18:06:10',
            ),
            1 => 
            array (
                'id' => 2,
                'nominal' => 500000,
                'tanggal_transaksi' => '2024-08-25 18:06:17',
                'siswa_id' => 1,
                'tagihan_id' => 2,
                'siswa_tagihan_id' => 32,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-08-25 18:06:17',
                'updated_at' => '2024-08-25 18:06:17',
            ),
        ));
        
        
    }
}