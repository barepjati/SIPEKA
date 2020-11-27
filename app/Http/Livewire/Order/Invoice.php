<?php

namespace App\Http\Livewire\Order;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Livewire\Component;

class Invoice extends Component
{
    public $pemesananId, $no_transaksi, $status, $nama, $total, $cart, $uang, $kembali, $user, $dibuat, $kuantitas;

    /**
     * mount or construct function
     */
    public function mount($id, $uang)
    {
        $target = Pemesanan::findOrFail($id);
        $cart   = DetailPemesanan::where('transaksi_id', $id)->get();

        if ($target) {
            $this->pemesananId  = $target->id;
            $this->no_transaksi = $target->no_transaksi;
            $this->status       = $target->status;
            $this->nama         = $target->nama;
            $this->total        = $target->total;
            $this->user         = $target->user->karyawan->nama;
            $this->cart         = $cart;
            $this->uang         = $uang;
            $this->kembali      = $this->total - $this->uang;
            $this->dibuat       = $target->created_at;
        }
    }

    public function kembali()
    {
        return redirect()->route('pemesanan.index');
    }

    public function render()
    {
        return view('livewire.order.invoice')
            ->layout('karyawan.pemesanan.struk');
    }
}
