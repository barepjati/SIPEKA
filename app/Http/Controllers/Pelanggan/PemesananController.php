<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view();
    }

    public function history()
    {
        // $data = Pemesanan::where('pelanggan_id', \Auth::user()->pelanggan->id);
        return view('pelanggan.pemesanan.history', [
            'title' => 'pemesanan',
            'subtitle' => 'history pemesanan',
            'active' => 'pemesanan',
            // 'data' => $data
        ]);
    }
}
