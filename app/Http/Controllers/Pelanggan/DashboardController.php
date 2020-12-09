<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // $kategori = Kategori::count();

        return view('pelanggan.dashboard.index', [
            'title'         => 'Dashboard',
            'subtitle'      => '',
            'active'        => 'dashboard',
            // 'kategori'            => $kategori,
            // 'jmlkaryawan'   => Karyawan::count(),
            // 'jmlmenu'       => Menu::count(),
            // 'jmlkategori'   => Kategori::count(),
        ]);
    }
}
