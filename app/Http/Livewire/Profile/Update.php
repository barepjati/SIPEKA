<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Update extends Component
{
    public $empId, $nama, $email, $username, $password, $newpassword, $newconfirmpassword;

    /**
     * mount or construct function
     */
    public function mount()
    {
        $user = Auth::user();
        if (Auth::user()->role_id == 1) {
            $this->empId    = $user->id;
            $this->nama     = $user->manager->nama;
            // $this->password = $user->password;
            $this->email    = $user->email;
            $this->username = $user->username;
        } else {
            $this->empId    = $user->id;
            $this->nama     = $user->employee->nama;
            // $this->password = $user->password;
            $this->email    = $user->email;
            $this->username = $user->username;
        }

        // dd($user);
    }

    public function update()
    {
        $this->validate([
            'password'              => 'required',
            'newpassword'           => 'required|required_with:newconfirmpassword|same:newconfirmpassword|min:8|different:password',
            'newconfirmpassword'    => 'required|min:8'
        ]);

        // $this->validate([
        //     'nama'      => 'required|min:6',
        //     'username'  => 'required|min:6',
        //     'email'     => 'required|email',
        // ]);

        $user = Auth::user();
        // dd($user);


        if (Hash::check($this->password, $user->password)) {
            $this->password = $this->newpassword;
            // dd($this->password);
            $user->update([
                'password' => Hash::make($this->password)
            ]);
            session()->flash('message', 'Password ' . $this->nama . ' Berhasil Diupdate.');
            return redirect()->route('employee.profil.index');
        } else {
            session()->flash('message', 'Data ' . $this->nama . ' Gagal Diupdate.');
            return redirect()->route('employee.profil.index');
        }
    }

    public function showIndex()
    {
        return redirect()->route('employee.profil.index');
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
