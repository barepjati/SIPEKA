<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [
            [
                'nama' => 'karyawan1',
                'user_id' => 3,
            ],
            [
                'nama' => 'karyawan2',
                'user_id' => 4,
            ]
        ];

        foreach ($employee as $e) {
            Employee::create($e);
        }
    }
}
