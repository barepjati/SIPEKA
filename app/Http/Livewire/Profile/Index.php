<?php

namespace App\Http\Livewire\Profile;

use App\Models\Employee;
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
        if (Auth::user()->role_id == 1) {
            $this->empId    = $user->id;
            $this->nama     = $user->nama;
            $this->email    = $user->manager->email;
            $this->username = $user->manager->username;
        } else {
            $this->empId    = $user->id;
            $this->nama     = $user->employee->nama;
            $this->email    = $user->email;
            $this->username = $user->username;
        }

        // dd($user);
    }

    public function changePass()
    {
        return redirect()->route('employee.profil.edit');
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
