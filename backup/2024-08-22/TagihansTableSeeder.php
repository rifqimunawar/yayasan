<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagihansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tagihans')->delete();
        
        \DB::table('tagihans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Uang Pangkal',
                'nominal' => 1000000,
                'deleted_at' => NULL,
                'created_at' => '2024-08-22 06:29:02',
                'updated_at' => '2024-08-22 06:29:02',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Uang Bangunan',
                'nominal' => 2000000,
                'deleted_at' => NULL,
                'created_at' => '2024-08-22 06:29:13',
                'updated_at' => '2024-08-22 06:29:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Baju Olahraga',
                'nominal' => 100000,
                'deleted_at' => NULL,
                'created_at' => '2024-08-22 06:29:36',
                'updated_at' => '2024-08-22 06:29:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'SPP Januari',
                'nominal' => 300000,
                'deleted_at' => NULL,
                'created_at' => '2024-08-22 08:29:38',
                'updated_at' => '2024-08-22 08:29:38',
            ),
        ));
        
        
    }
}