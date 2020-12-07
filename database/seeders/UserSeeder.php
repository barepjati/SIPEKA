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
                'email'     => 'manager1@manager.com',
                'username'  => 'manager1',
                'password'  => Hash::make('12345678'),
                'role_id'   => '1'
            ],

            [
                'email'     => 'manager2@manager.com',
                'username'  => 'manager2',
                'password'  => Hash::make('12345678'),
                'role_id'   => '1'
            ],
            [
                'email'     => 'karyawan1@karyawan.com',
                'username'  => 'karyawan1',
                'password'  => Hash::make('12345678'),
                'role_id'   => '2'
            ],
            [
                'email'     => 'karyawan2@karyawan.com',
                'username'  => 'karyawan2',
                'password'  => Hash::make('12345678'),
                'role_id'   => '2'
            ],
            [
                'email'     => 'pelanggan1@pelanggan.com',
                'username'  => 'pelanggan1',
                'password'  => Hash::make('12345678'),
                'role_id'   => '3'
            ],
            [
                'email'     => 'pelanggan2@pelanggan.com',
                'username'  => 'pelanggan2',
                'password'  => Hash::make('12345678'),
                'role_id'   => '3'
            ]

        ];

        foreach ($users as $u) {
            User::create($u);
        }
    }
}
