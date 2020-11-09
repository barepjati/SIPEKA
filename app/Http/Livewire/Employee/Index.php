<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{

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

    /**
     * create function
     */
    public function create()
    {
        return redirect()->route('employee.create');
    }

    /**
     * update function
     */
    public function edit($id)
    {
        return redirect()->route('employee.edit', $id);
    }

    /**
     * destroy function
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        // dd($employee);

        if ($employee) {
            $employee->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('employee.index');
    }
}
