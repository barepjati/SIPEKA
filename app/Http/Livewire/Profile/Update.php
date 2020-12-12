<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Update extends Component
{
    public $userId, $nama, $email, $username, $old, $new, $confirm;

    /**
     * mount or construct function
     */
    public function mount()
    {
        $user = Auth::user();
        if (Auth::user()->role_id == 3) {
            $this->userId   = $user->id;
            $this->nama     = $user->pelanggan->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
        } elseif (Auth::user()->role_id == 2) {
            $this->userId   = $user->id;
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
        'new' => ['required', 'string', 'min:8', 'different:old'],
    ];

    protected $messages = [
        'old.required' => 'Field Password tidak boleh kosong.',
        'new.required' => 'Field Password Baru tidak boleh kosong.',
        'new.min' => 'Field Password Baru Minimal 8 karakter.',
        // 'new.confirmed' => 'Field Password Baru harus sama dengan Field Konfirmasi Password.',
        'new.different' => 'Field Password Baru harus beda dengan Field Password  Lama.',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function update()
    {
        $user = Auth::user();
        $this->validate();
        if (Hash::check($this->old, $user->password)) {
            $user->update([
                'password' => Hash::make($this->new)
            ]);
            session()->flash('message', 'Password ' . $this->nama . ' Berhasil Diupdate.');
            if (Auth::user()->role_id == 3) {
                return redirect()->route('pelanggan.profil');
            } else {
                return redirect()->route('profil.index');
            }
        } else {
            session()->flash('message', 'Data ' . $this->nama . ' Gagal Diupdate.');
            if (Auth::user()->role_id == 3) {
                return redirect()->route('pelanggan.profil');
            } else {
                return redirect()->route('profil.index');
            }
        }
    }

    public function showIndex()
    {
        if (Auth::user()->role_id == 2) {
            return redirect()->route('profil.index');
        } else {
            return redirect()->route('pelanggan.profil');
        }
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
