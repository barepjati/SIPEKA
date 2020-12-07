<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pelanggan')->truncate();
        \DB::table('pelanggan')->insert([
            [
                'nama'      => 'pelanggan1',
                'user_id'   => 5
            ],
            [
                'nama'      => 'pelanggan2',
                'user_id'   => 6
            ]
        ]);
    }
}
