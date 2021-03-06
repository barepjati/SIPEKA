<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            KaryawanSeeder::class,
            ManajerSeeder::class,
            PelangganSeeder::class,
            KategoriSeeder::class,
            MenuSeeder::class,
            TransaksiSeeder::class,
            DetailTransaksiSeeder::class,
            AlamatSeeder::class,
        ]);
    }
}
