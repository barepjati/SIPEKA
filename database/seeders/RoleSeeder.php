<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'nama'  => 'manager'
            ],

            [
                'nama'  => 'employee'
            ]
        ];

        foreach ($role as $r) {
            Role::create($r);
        }
    }
}
