<?php

namespace App\Http\Livewire\Laporan\Penjualan;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $total, $yesterday, $persen, $month, $year, $count;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $now = Carbon::now();
        $yesterday = $this->lastMont();
        $this->month = $now->month;
        $this->year = $now->year;
        $dataSkrg = Pemesanan::where('status', 'selesai')->whereMonth('created_at', $now->month)->get();
        $dataBlnLalu = Pemesanan::where('status', 'selesai')->whereMonth('created_at', $yesterday)->get();
        foreach ($dataSkrg as $d) {
            $this->total += $d->total;
        }
        foreach ($dataBlnLalu as $d) {
            $this->yesterday += $d->total;
        }
        $this->persen = ($this->total - $this->yesterday) / $this->yesterday * 100;
        $this->count = $dataSkrg;
    }

    public function lastMont()
    {
        $date = Carbon::now();
        $lastMonth =  $date->subMonth()->format('m');
        return $lastMonth;
    }

    public function month()
    {
        $date = Carbon::now()->format('m');
        return $date;
    }

    public function render()
    {
        return view('livewire.laporan.penjualan.index', [
            'data' => Pemesanan::whereMonth('created_at', 'like', '%' . $this->month . '%')
                ->WhereYear('created_at', 'like', '%' . $this->year . '%')
                ->latest()
                ->paginate(10),
        ]);
    }
}
