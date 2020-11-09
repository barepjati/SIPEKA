<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.employee.create')
            ->layout('layouts.myview', [
                'title'     => 'Employee',
                'subtitle'  => 'Create',
                'active'    => 'employee.index'
            ]);
    }

    public function showIndex()
    {
        return redirect()->route('employee.index');
    }
}
