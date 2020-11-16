<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kategori')->truncate();
        DB::table('kategori')->insert([
            [
                'nama'  => 'makanan',
            ],
            [
                'nama'  => 'minuman',
            ]
        ]);
    }
}
