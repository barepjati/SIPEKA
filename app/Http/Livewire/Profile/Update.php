<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Update extends Component
{
    public $empId, $nama, $email, $username, $old, $new, $konfirmasi;

    /**
     * mount or construct function
     */
    public function mount()
    {
        $user = Auth::user();
        if (Auth::user()->role_id == 1) {
            $this->empId    = $user->id;
            $this->nama     = $user->manager->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
        } else {
            $this->empId    = $user->id;
            $this->nama     = $user->karyawan->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
        }
    }

    /**
     * rules
     */
    protected $rules = [
        'old' => ['required'],
        'new' => ['required', 'min:8', 'different:old', 'confirmed'],
        'konfirmasi' => ['required'],
    ];

    protected $messages = [
        'old.required' => 'Field Password tidak boleh kosong.',
        'new.required' => 'Field Password Baru tidak boleh kosong.',
        'new.min' => 'Field Password Baru Minimal 8 karakter.',
        'new.confirmed' => 'Field Password Baru harus sama dengan Field Konfirmasi Password.',
        'new.different' => 'Field Password Baru harus beda dengan Field Password  Lama.',
        'konfirmasi.required' => 'Field Konfirmasi Password tidak boleh kosong.',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function update()
    {
        $this->validate();

        // $user = Auth::user();
        // dd(Hash::check($this->password, $user->password));

        // if (Hash::check($this->password, $user->password)) {
        //     $this->password = $this->newpassword;
        //     dd($this->password);
        //     $user->update([
        //         'password' => Hash::make($this->password)
        //     ]);
        //     session()->flash('message', 'Password ' . $this->nama . ' Berhasil Diupdate.');
        //     return redirect()->route('profil.index');
        // } else {
        //     dd('masuk');
        //     session()->flash('message', 'Data ' . $this->nama . ' Gagal Diupdate.');
        //     return redirect()->route('profil.edit');
        // }
    }

    public function showIndex()
    {
        return redirect()->route('profil.index');
    }

    public function render()
    {
        return view('livewire.profile.update')
            ->layout('layouts.myview', [
                'title'     => 'profil',
                'subtitle'  => '',
                'active'    => 'profile.index'
            ]);
    }
}
