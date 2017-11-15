<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([[
            'kategori' => 'Desa',
            'parent_id' => null,
            'keterangan' => null
        ],
        [
            'kategori' => 'Pelatihan',
            'parent_id' => 1,
            'keterangan' => null
        ],
        [
            'kategori' => 'Karangtaruna',
            'parent_id' => 1,
            'keterangan' => null
        ],
        [
            'kategori' => 'Kepala Desa',
            'parent_id' => null,
            'keterangan' => null
        ]]);
    }
}
