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
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-08-22 06:29:02',
                'updated_at' => '2024-08-22 06:29:02',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Uang Bangunan',
                'nominal' => 2000000,
                'category_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-08-22 06:29:13',
                'updated_at' => '2024-08-22 06:29:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Baju Olahraga',
                'nominal' => 100000,
                'category_id' => 2,
                'deleted_at' => '2024-08-25 16:37:50',
                'created_at' => '2024-08-22 06:29:36',
                'updated_at' => '2024-08-25 16:37:50',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'SPP Januari SMA',
                'nominal' => 300000,
                'category_id' => 3,
                'deleted_at' => '2024-08-25 16:37:46',
                'created_at' => '2024-08-22 08:29:38',
                'updated_at' => '2024-08-25 16:37:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'SPP Januari',
                'nominal' => 500000,
                'category_id' => 1,
                'deleted_at' => '2024-08-25 16:37:42',
                'created_at' => '2024-08-25 16:33:21',
                'updated_at' => '2024-08-25 16:37:42',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Spp Februari',
                'nominal' => 500000,
                'category_id' => 1,
                'deleted_at' => '2024-08-25 16:37:38',
                'created_at' => '2024-08-25 16:37:15',
                'updated_at' => '2024-08-25 16:37:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Uang Bangunan',
                'nominal' => 900000,
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-08-25 16:44:05',
                'updated_at' => '2024-08-25 16:44:05',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Spp Januari 2023/2024',
                'nominal' => 900000,
                'category_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-08-25 16:47:04',
                'updated_at' => '2024-08-25 16:47:04',
            ),
        ));
        
        
    }
}