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
                'name' => 'Rifqi',
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
                'id' => 2,
                'name' => 'Jane Smith',
                'role_id' => 2,
                'email' => 'jane.smith@example.com',
                'email_verified_at' => '2024-08-19 18:07:48',
                'password' => '$2y$12$u0sBzbEfAoXst5NyWmixy.X4FypPZ/qABRlvx77Rvb0FQBaNpX0ma',
                'remember_token' => '',
                'created_at' => '2024-08-19 18:07:49',
                'updated_at' => '2024-08-19 18:07:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Alice Johnson',
                'role_id' => 2,
                'email' => 'alice.johnson@example.com',
                'email_verified_at' => '2024-08-19 18:07:49',
                'password' => '$2y$12$N31yQkMJKKiQIjQ.bnpH0uUjfqm3.ZeMsndmQ9phDZRSq0tNF.1Xe',
                'remember_token' => '',
                'created_at' => '2024-08-19 18:07:49',
                'updated_at' => '2024-08-19 18:07:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Bob Brown',
                'role_id' => 3,
                'email' => 'bob.brown@example.com',
                'email_verified_at' => '2024-08-19 18:07:49',
                'password' => '$2y$12$qO8Z1ZMYJRSMBP3OTOM72ej6c8WUUFdRgTp7NGKyuiVIjxNHH0VM.',
                'remember_token' => '',
                'created_at' => '2024-08-19 18:07:49',
                'updated_at' => '2024-08-19 18:07:49',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Charlie White',
                'role_id' => 1,
                'email' => 'charlie.white@example.com',
                'email_verified_at' => '2024-08-19 18:07:49',
                'password' => '$2y$12$CXD.ptooJ9pJ73a4AQthm.HbkCziO3B8mA/v7HchEI/5D28rHs4PW',
                'remember_token' => '',
                'created_at' => '2024-08-19 18:07:50',
                'updated_at' => '2024-08-19 18:07:50',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Munawar Ridwan',
                'role_id' => 1,
                'email' => 'munawar@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$./qEY5AwoIh73nzKjYEbB.x6j8X.btQfi4zg1V4NOnbNFJ.Mhmv4q',
                'remember_token' => NULL,
                'created_at' => '2024-08-21 03:11:33',
                'updated_at' => '2024-08-21 03:25:17',
            ),
        ));
        
        
    }
}