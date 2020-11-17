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
     * rules
     */
    protected $rules = [
        'nama' => 'required|min:6',
        'email' => 'required|email',
        'username' => 'required|min:6',
    ];

    protected $messages = [
        'nama.required' => 'Field Nama tidak boleh kosong.',
        'nama.min' => 'Field Nama Minimal 6 karakter.',
        'email.required' => 'Field Email tidak boleh kosong.',
        'email.email' => 'Email tidak valid.',
        'username.required' => 'Field Username tidak boleh kosong.',
        'username.min' => 'Field Username Minimal 6 karakter.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate();

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
        return view('livewire.employee.update');
    }
}
