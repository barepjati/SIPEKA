<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'manager1@manager.com',
                'password' => Hash::make('12345678'),
            ],

            [
                'email' => 'manager2@manager.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'email' => 'karyawan1@karyawan.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'email' => 'karyawan2@karyawan.com',
                'password' => Hash::make('12345678'),
            ]
        ];

        foreach ($users as $u) {
            User::create($u);
        }
    }
}
