<?php

namespace App\Http\Livewire\Employee;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $email;
    public $username;
    public $password;

    protected $rules = [
        'nama' => 'required|min:6',
        'email' => 'required|email',
        'username' => 'required|min:6',
        'password' => 'required|min:8',
    ];

    protected $messages = [
        'nama.required' => 'Field Nama tidak boleh kosong.',
        'nama.min' => 'Field Nama Minimal 6 karakter.',
        'email.required' => 'Field Email tidak boleh kosong.',
        'email.email' => 'Email tidak valid.',
        'username.required' => 'Field Username tidak boleh kosong.',
        'username.min' => 'Field Username Minimal 6 karakter.',
        'password.required' => 'Field Password tidak boleh kosong.',
        'password.min' => 'Field Password Minimal 8 karakter.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        $this->validate();

        // dd($this->nama);

        $user =  User::create([
            'email' => $this->email,
            'password' => $this->password,
            'username' => $this->username,
            'role_id' => 2
        ]);

        Karyawan::create([
            'nama' => $this->nama,
            'user_id' => $user->id,
        ]);

        session()->flash('message', 'Data ' . $this->nama . ' Berhasil Ditambah.');

        return redirect()->route('karyawan.index');
    }

    public function showIndex()
    {
        return redirect()->route('karyawan.index');
    }

    public function render()
    {
        // dd('masuk create');
        return view('livewire.employee.create');
    }
}
