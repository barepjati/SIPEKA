<?php

namespace App\Http\Livewire\Profile;

use App\Models\Employee;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $empId, $nama, $email, $username;

    /**
     * mount or construct function
     */
    public function mount()
    {
        $user = Auth::user();

        if (Auth::user()->role == 'manajer') {
            $this->empId    = $user->id;
            $this->nama     = $user->nama;
            $this->email    = $user->manajer->email;
            $this->username = $user->manajer->username;
        } else {

            $this->empId    = $user->id;
            $this->nama     = $user->karyawan->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
        }

        // dd($user);
    }

    public function changePass()
    {
        // dd('masuk');
        return redirect()->route('profil.edit', Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.profile.index')
            ->layout('layouts.myview', [
                'title'     => 'profil',
                'subtitle'  => '',
                'active'    => 'profile.index'
            ]);;
    }
}
