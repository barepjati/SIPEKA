<?php

namespace App\View\Components;

use App\Models\Pemesanan;
use Illuminate\View\Component;

class Navbar extends Component
{
    // public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        // $data = asfk;
    }

    public function detail($id)
    {
        # code...
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $data = Pemesanan::where('status', 'pending')->get();
        // dd($data);
        return view('components.navbar', [
            'data'  => Pemesanan::where('status', 'pending')->orWhere('status', 'diproses')->get(),
            'pending'  => Pemesanan::where('status', 'pending')->get(),
            'proses'  => Pemesanan::where('status', 'diproses')->get(),
        ]);
    }
}
