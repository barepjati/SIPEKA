<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\User;
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
        $employee = Employee::findOrFail($id);
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
            'nama'  => 'required|min:6',
            'email' => 'required|email',
        ]);

        $employee = Employee::findOrFail($this->empId);
        // dd($employee->user);

        $employee->update([
            'nama'  => $this->nama,
        ]);

        $employee->user->update([
            'email' => $this->email
        ]);

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
        // dd('masuk update');
        return view('livewire.employee.update')
            ->layout('layouts.myview', [
                'title'     => 'Employee',
                'subtitle'  => '',
                'active'    => 'employee.index'
            ]);
    }
}
