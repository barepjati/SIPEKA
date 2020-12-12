<?php

namespace App\Http\Livewire\Profile;

// use App\Models\Manager;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $userId, $nama, $email, $username, $alamat;

    /**
     * mount or construct function
     */
    public function mount()
    {
        $user = Auth::user();
        $alamat = Alamat::where('user_id', Auth::user()->id)->where('status', 'dipilih')->first();
        // dd($alamat);
        if (Auth::user()->role_id == 3) {
            $this->userId   = $user->id;
            $this->nama     = $user->pelanggan->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
            if ($alamat != null) {
                $this->alamat   = $alamat;
            } else {
                $this->alamat   = null;
            }
        } elseif (Auth::user()->role_id == 2) {
            $this->userId   = $user->id;
            $this->nama     = $user->karyawan->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
        }
    }

    public function changePass()
    {
        if (Auth::user()->role_id == 3) {
            return redirect()->route('pelanggan.edit', Auth::user()->id);
        } else {
            return redirect()->route('profil.edit', Auth::user()->id);
        }
    }

    public function alamat()
    {

        return redirect()->route('pelanggan.alamat');
        // return redirect()->route('profil.edit', Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.profile.index')
            ->layout('layouts.myview', [
                'title'     => 'profil',
                'subtitle'  => '',
                'active'    => 'profile.index'
            ]);
    }
}
