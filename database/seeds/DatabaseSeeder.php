<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(VaitroTableSeeder::class);
        //$this->call(NhanvienTableSeeder::class);
        $this->call(LinhvucTableSeeder::class);
        $this->call(ChudeTableSeeder::class);
  
    }
}
