<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('detail_transaksi')->truncate();
        \DB::table('detail_transaksi')->insert([
            [
                'transaksi_id'  => 1,
                'menu_id'       => 2,
                'kuantitas'     => "2",
                'created_at'    => '2020-11-25 08:09:45',
                'harga'         => '20000'
            ],
            [
                'transaksi_id'  => 1,
                'menu_id'       => 3,
                'kuantitas'     => "2",
                'created_at'    => '2020-11-25 08:09:45',
                'harga'         => '20000'
            ],
            [
                'transaksi_id'  => 1,
                'menu_id'       => 7,
                'kuantitas'     => "3",
                'created_at'    => '2020-11-25 08:09:45',
                'harga'         => '9000'
            ],
            [
                'transaksi_id'  => 1,
                'menu_id'       => 10,
                'kuantitas'     => "1",
                'created_at'    => '2020-11-25 08:09:45',
                'harga'         => '9000'
            ],
            [
                'transaksi_id'  => 2,
                'menu_id'       => 1,
                'kuantitas'     => "6",
                'created_at'    => '2020-11-26 08:09:45',
                'harga'         => '90000'
            ],
            [
                'transaksi_id'  => 2,
                'menu_id'       => 7,
                'kuantitas'     => "6",
                'created_at'    => '2020-11-26 08:09:45',
                'harga'         => '18000'
            ],
            [
                'transaksi_id'  => 3,
                'menu_id'       => 4,
                'kuantitas'     => "10",
                'created_at'    => '2020-11-27 08:09:45',
                'harga'         => '150000'
            ],
            [
                'transaksi_id'  => 3,
                'menu_id'       => 10,
                'kuantitas'     => "10",
                'created_at'    => '2020-11-27 08:09:45',
                'harga'         => '30000'
            ],
            [
                'transaksi_id'  => 4,
                'menu_id'       => 2,
                'kuantitas'     => "30",
                'created_at'    => '2020-11-28 08:09:45',
                'harga'         => '300000'
            ],
            [
                'transaksi_id'  => 4,
                'menu_id'       => 7,
                'kuantitas'     => "30",
                'created_at'    => '2020-11-28 08:09:45',
                'harga'         => '90000'
            ],
            [
                'transaksi_id'  => 5,
                'menu_id'       => 3,
                'kuantitas'     => "3",
                'created_at'    => '2020-11-29 08:09:45',
                'harga'         => '30000'
            ],
            [
                'transaksi_id'  => 5,
                'menu_id'       => 10,
                'kuantitas'     => "3",
                'created_at'    => '2020-11-29 08:09:45',
                'harga'         => '9000'
            ],
            [
                'transaksi_id'  => 6,
                'menu_id'       => 2,
                'kuantitas'     => "3",
                'created_at'    => '2020-11-30 08:09:45',
                'harga'         => '20000'
            ],
            [
                'transaksi_id'  => 6,
                'menu_id'       => 10,
                'kuantitas'     => "3",
                'created_at'    => '2020-11-30 08:09:45',
                'harga'         => '9000'
            ]
        ]);
    }
}
