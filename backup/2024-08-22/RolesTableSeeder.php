<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'System Admininstrator',
                'created_at' => '2024-08-19 18:07:48',
                'updated_at' => '2024-08-21 03:12:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User',
                'created_at' => '2024-08-19 18:07:48',
                'updated_at' => '2024-08-19 18:07:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Manager',
                'created_at' => '2024-08-19 18:07:48',
                'updated_at' => '2024-08-19 18:07:48',
            ),
        ));
        
        
    }
}