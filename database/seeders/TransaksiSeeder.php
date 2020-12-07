<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('transaksi')->truncate();
        \DB::table('transaksi')->insert([
            [
                'no_transaksi'  => (string) \Str::uuid(),
                'status'        => 'selesai',
                'user_id'       => 3,
                'nama'          => 'Siti',
                'created_at'    => '2020-11-25 08:09:45',
                'total'         => '58000'
            ],
            [
                'no_transaksi'  => (string) \Str::uuid(),
                'status'        => 'selesai',
                'user_id'       => 3,
                'nama'          => 'Mumun',
                'created_at'    => '2020-11-26 08:09:45',
                'total'         => '108000'
            ],
            [
                'no_transaksi'  => (string) \Str::uuid(),
                'status'        => 'selesai',
                'user_id'       => 3,
                'nama'          => 'Gota',
                'created_at'    => '2020-11-27 08:09:45',
                'total'         => '180000'
            ],
            [
                'no_transaksi'  => (string) \Str::uuid(),
                'status'        => 'selesai',
                'user_id'       => 4,
                'nama'          => 'Gal',
                'created_at'    => '2020-11-28 08:09:45',
                'total'         => '390000'
            ],
            [
                'no_transaksi'  => (string) \Str::uuid(),
                'status'        => 'selesai',
                'user_id'       => 4,
                'nama'          => 'Alfi',
                'created_at'    => '2020-11-29 08:09:45',
                'total'         => '39000'
            ],
            [
                'no_transaksi'  => (string) \Str::uuid(),
                'status'        => 'selesai',
                'user_id'       => 3,
                'nama'          => 'Niki',
                'created_at'    => '2020-11-30 08:09:45',
                'total'         => '29000'
            ],
        ]);
    }
}
