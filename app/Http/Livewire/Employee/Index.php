<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    // public function mount(Employee $employee)
    // {
    //     $employee = Employee::all();
    // }

    public function render()
    {
        return view('livewire.employee.index',  [
            'data' => Employee::all()
        ])
            ->layout('layouts.myview', [
                'title'     => 'Employee',
                'subtitle'  => '',
                'active'    => 'employee.index'
            ]);
    }

    public function create()
    {
        return redirect()->route('employee.create');
    }

    public function show($id)
    {
        # code...
    }
}
