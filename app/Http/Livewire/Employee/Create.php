<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $email;
    public $username;

    protected $rules = [
        'nama' => 'required|min:6',
        'email' => 'required|email',
        'username' => 'required|min:6',
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
            'password' => Hash::make('12345678'),
            'username' => $this->username,
            'role_id' => 2
        ]);

        Employee::create([
            'nama' => $this->nama,
            'user_id' => $user->id,
        ]);

        session()->flash('message', 'Data ' . $this->nama . ' Berhasil Ditambah.');

        return redirect()->route('employee.index');
    }

    public function showIndex()
    {
        return redirect()->route('employee.index');
    }

    public function render()
    {
        // dd('masuk create');
        return view('livewire.employee.create')
            ->layout('layouts.myview', [
                'title'     => 'Employee',
                'subtitle'  => 'Create',
                'active'    => 'employee.index'
            ]);
    }
}
