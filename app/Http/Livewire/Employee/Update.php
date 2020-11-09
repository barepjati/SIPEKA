<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Update extends Component
{
    /**
     * define public variable
     */
    public $empId;
    public $nama;
    public $email;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $employee = Employee::find($id);
        // dd($employee->user->email);
        if ($employee) {
            $this->empId    = $employee->id;
            $this->nama     = $employee->nama;
            $this->email    = $employee->user->email;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'nama'  => 'required',
            'email' => 'required',
        ]);

        if ($this->empId) {

            $employee = Employee::find($this->empId);

            if ($employee) {
                $employee->update([
                    'nama'  => $this->nama,
                    'email' => $this->email
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data ' . $this->nama . ' Berhasil Diupdate.');

        //redirect
        return redirect()->route('employee.index');
    }

    public function showIndex()
    {
        return redirect()->route('employee.index');
    }

    public function render()
    {
        return view('livewire.employee.update')
            ->layout('layouts.myview', [
                'title'     => 'Employee',
                'subtitle'  => '',
                'active'    => 'employee.index'
            ]);
    }
}
