<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = [
            [
                'nama' => 'manager1',
                'user_id' => 1,
            ],
            [
                'nama' => 'manager2',
                'user_id' => 2,
            ]
        ];

        foreach ($manager as $m) {
            Manager::create($m);
        }
    }
}
