<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->insert([[
            'tag' => 'Desa',
            'keterangan' => null
        ],
        [
            'tag' => 'Pelatihan',
            'keterangan' => null
        ],
        [
            'tag' => 'Karangtaruna',
            'keterangan' => null
        ],
        [
            'tag' => 'Kepala Desa',
            'keterangan' => null
        ]]);
    }
}
