<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\Karyawan;
use App\Models\User;
use Livewire\Component;

class Update extends Component
{
    /**
     * define public variable
     */
    public $empId, $nama, $email, $username;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $employee = Karyawan::findOrFail($id);
        // dd($employee->user->email);
        if ($employee) {
            $this->empId    = $employee->id;
            $this->nama     = $employee->nama;
            $this->email    = $employee->user->email;
            $this->username = $employee->user->username;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'nama'      => 'required|min:6',
            'username'  => 'required|min:6',
            'email'     => 'required|email',
        ]);

        $employee = Karyawan::findOrFail($this->empId);

        $employee->update([
            'nama'  => $this->nama,
        ]);

        $employee->user->update([
            'email' => $this->email,
            'username' => $this->username
        ]);

        //flash message
        session()->flash('message', 'Data ' . $this->nama . ' Berhasil Diupdate.');

        //redirect
        return redirect()->route('karyawan.index');
    }

    public function showIndex()
    {
        session()->flash('message', 'Data ' . $this->nama . ' Batal Diupdate.');
        return redirect()->route('karyawan.index');
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
