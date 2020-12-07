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
                'nama'  => 'Nasi Goreng',
                'deskripsi'  => 'Nasi digoreng',
                'harga'  => '10000',
                'kategori_id'  => '1',
            ],
            [
                'nama'  => 'Mie Goreng',
                'deskripsi'  => 'Mie digoreng',
                'harga'  => '10000',
                'kategori_id'  => '1',
            ],
            [
                'nama'  => 'Cap Jay',
                'deskripsi'  => 'ini Cap Jay',
                'harga'  => '15000',
                'kategori_id'  => '1',
            ],
            [
                'nama'  => 'Nasi Rawon',
                'deskripsi'  => 'ini Nasi Rawon',
                'harga'  => '20000',
                'kategori_id'  => '1',
            ],
            [
                'nama'  => 'Wedhang Cor',
                'deskripsi'  => 'wedhang dengan ketan',
                'harga'  => '7500',
                'kategori_id'  => '2',
            ],
            [
                'nama'  => 'Es Teh',
                'deskripsi'  => 'teh dengan es',
                'harga'  => '3000',
                'kategori_id'  => '2',
            ],
            [
                'nama'  => 'Es Jeruk',
                'deskripsi'  => 'Es dengan perasan jeruk',
                'harga'  => '4000',
                'kategori_id'  => '2',
            ],
            [
                'nama'  => 'Lime Squash',
                'deskripsi'  => 'Es dengan perasan lemon',
                'harga'  => '6000',
                'kategori_id'  => '2',
            ],
            [
                'nama'  => 'Teh Hangat',
                'deskripsi'  => 'Teh dengan air hangat',
                'harga'  => '3000',
                'kategori_id'  => '2',
            ],
            [
                'nama'  => 'Jeruk Hangat',
                'deskripsi'  => 'perasan jeruk dengan air hangat',
                'harga'  => '4000',
                'kategori_id'  => '2',
            ]
        ]);
    }
}
