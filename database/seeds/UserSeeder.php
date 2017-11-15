<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$id = DB::table('grup')->insertGetId([
            'grup' => 'developer',
            'keterangan' => 'Grup Developer'
        ]);
        DB::table('user')->insert([
            'username' => 'developer',
            'nama' => 'Developer',
            'email' => 'developer@developer.com',
            'password' => bcrypt('developer'),
            'id_grup' => $id,
            'terakhir_login' => CarbonDate('Y-m-d')
        ]);
    }
}
