<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('karyawan')->truncate();
        \DB::table('karyawan')->insert([
            [
                'nama'      => 'karyawan1',
                'user_id'   => 3
            ],
            [
                'nama'      => 'karyawan2',
                'user_id'   => 4
            ]
        ]);
    }
}
