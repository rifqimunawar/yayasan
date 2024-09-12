<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Rifqi Munawar',
                'username' => 'rifqi',
                'role_id' => 1,
                'email' => 'rifqi@gmail.com',
                'email_verified_at' => '2024-08-19 18:07:48',
                'password' => '$2y$12$Tn8t58aPVsuxoylVKlOkT.EzVUVN97Xvb6mOp2Jd37Z4cE9Haz9Iq',
                'remember_token' => '',
                'created_at' => '2024-08-19 18:07:48',
                'updated_at' => '2024-08-19 18:07:48',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'user',
                'username' => 'user',
                'role_id' => 2,
                'email' => 'user@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$tfDFYq22.x1rLaO.W0Itl.uMlOWwOUczDkkyTD9U/LW9JoRcGL1uu',
                'remember_token' => NULL,
                'created_at' => '2024-08-27 23:30:29',
                'updated_at' => '2024-08-27 23:30:29',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'admin',
                'username' => 'admin',
                'role_id' => 1,
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$rWFVZ4xf9a0cxmkibT3wxuk1/TbZF3T69ohzX5Pk7B.CV0ApEjP3W',
                'remember_token' => NULL,
                'created_at' => '2024-08-27 23:30:53',
                'updated_at' => '2024-08-27 23:30:53',
            ),
        ));
        
        
    }
}