<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('alamat')->truncate();
        \DB::table('alamat')->insert([
            [
                'sebagai'   => 'rumah',
                'alamat'    => 'karyawan1',
                'user_id'   => 5
            ],
            [
                'sebagai'   => 'rumah',
                'alamat'    => 'karyawan2',
                'user_id'   => 6
            ]
        ]);
    }
}
