<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('menu')->truncate();
        DB::table('menu')->insert([
            [
                'nama'  => 'Soto Padang',
                'deskripsi'  => 'soto dari padang',
                'harga'  => '15000',
                'kategori_id'  => '1',
            ],
            [
                'nama'  => 'Wedhang Cor',
                'deskripsi'  => 'wedhang dengan ketan',
                'harga'  => '7500',
                'kategori_id'  => '2',
            ]
        ]);
    }
}
