<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ManajerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('manajer')->truncate();
        \DB::table('manajer')->insert([
            [
                'nama'      => 'manager1',
                'user_id'   => 1
            ],
            [
                'nama'      => 'manager2',
                'user_id'   => 2
            ]
        ]);
    }
}
