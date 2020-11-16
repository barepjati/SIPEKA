<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // $kategori = Kategori::count();

        return view('karyawan.dashboard.index', [
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
