<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GrupSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(UserSeeder::class);
    }
}
