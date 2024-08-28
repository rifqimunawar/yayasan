<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run() : void
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    $this->call(RolesTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(TahunMasuksTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(SiswasTableSeeder::class);
    $this->call(TagihansTableSeeder::class);
    $this->call(SiswaTagihanTableSeeder::class);
      $this->call(HistoriesTableSeeder::class);
    }
}
