<?php

namespace App\Http\Livewire\Profile;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Address extends Component
{
    public $userId, $nama, $email, $username, $alamat;

    public function mount()
    {
        $user = Auth::user();
        $alamat = Alamat::where('user_id', Auth::user()->id)->where('status', 'dipilih')->first();

        $this->userId   = $user->id;
        $this->nama     = $user->pelanggan->nama;
        $this->email    = $user->email;
        $this->username = $user->username;
        $this->alamat   = $alamat->alamat;
        // dd($this->alamat->alamat);
    }

    protected $rules = [
        'alamat' => ['required'],
        // 'new' => ['required', 'string', 'min:8', 'different:old'],
    ];

    protected $messages = [
        'alamat.required' => 'Field Alamat tidak boleh kosong.',
        // 'new.required' => 'Field Password Baru tidak boleh kosong.',
        // 'new.min' => 'Field Password Baru Minimal 8 karakter.',
        // 'new.confirmed' => 'Field Password Baru harus sama dengan Field Konfirmasi Password.',
        // 'new.different' => 'Field Password Baru harus beda dengan Field Password  Lama.',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function update()
    {
        $alamat = Alamat::where('user_id', Auth::user()->id)->where('status', 'dipilih')->first();
        // dd($this->alamat, $alamat);
        $this->validate();

        $alamat->update([
            'alamat' => $this->alamat
        ]);

        session()->flash('message', 'Password ' . $this->nama . ' Berhasil Diupdate.');
        return redirect()->route('pelanggan.profil');
    }

    public function render()
    {
        return view('livewire.profile.address')
            ->layout('layouts.myview', [
                'title'     => 'profil',
                'subtitle'  => 'edit alamat',
                'active'    => 'pemesanan.index'
            ]);
    }
}
