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
                'id' => 9,
                'nominal' => 500000,
                'tanggal_transaksi' => '2024-08-26 23:00:06',
                'siswa_id' => 1,
                'tagihan_id' => 2,
                'siswa_tagihan_id' => 2,
                'user_id' => 6,
                'deleted_at' => NULL,
                'created_at' => '2024-08-26 23:00:06',
                'updated_at' => '2024-08-26 23:00:06',
            ),
            1 => 
            array (
                'id' => 10,
                'nominal' => 500000,
                'tanggal_transaksi' => '2024-08-26 23:01:28',
                'siswa_id' => 1,
                'tagihan_id' => 2,
                'siswa_tagihan_id' => 2,
                'user_id' => 6,
                'deleted_at' => NULL,
                'created_at' => '2024-08-26 23:01:28',
                'updated_at' => '2024-08-26 23:01:28',
            ),
            2 => 
            array (
                'id' => 11,
                'nominal' => 500000,
                'tanggal_transaksi' => '2024-08-27 22:26:43',
                'siswa_id' => 514,
                'tagihan_id' => 8,
                'siswa_tagihan_id' => 3,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-08-27 22:26:43',
                'updated_at' => '2024-08-27 22:26:43',
            ),
        ));
        
        
    }
}