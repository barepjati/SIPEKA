<?php

namespace App\Http\Livewire\Order;

use App\Models\Alamat;
use App\Models\DetailPemesanan;
use App\Models\Menu;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Detail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariMenu, $pemesananId, $no_transaksi, $status, $nama, $total, $cart, $uang, $kembali, $alamat;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $target = Pemesanan::findOrFail($id);
        $cart   = DetailPemesanan::where('transaksi_id', $id)->get();
        // dd($target->alamat->alamat);
        if ($target) {
            $this->pemesananId  = $target->id;
            $this->no_transaksi = $target->no_transaksi;
            $this->status       = $target->status;
            $this->nama         = $target->nama;
            $this->total        = $target->total;
            $this->cart         = $cart;
            $this->uang         = 0;
            $this->kembali      = 0;
            $this->alamat       = $target->alamat->alamat;
        }
    }

    public function back()
    {
        if (Auth::user()->role_id == 3) {
            return redirect()->route('pesan.history');
        } else {
            return redirect()->route('pemesanan.index');
        }
    }

    public function proses($id)
    {
        $data = Pemesanan::find($id);
        $data->update([
            'status'    => 'diproses',
            'user_id'   => \Auth::user()->id
        ]);
        $this->status = $data->status;
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Pesanan diupdate ke diproses.']);
        // return redirect()->back();
    }

    public function kirim($id)
    {
        $data = Pemesanan::find($id);
        $data->update([
            'status'    => 'dikirim',
            'user_id'   => \Auth::user()->id
        ]);
        $this->status = $data->status;
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Pesanan diupdate ke dikirim.']);
    }

    public function render()
    {
        return view('livewire.order.detail', [
            'menu'  => Menu::where('status', 'tersedia')
                ->where('nama', 'like', '%' . $this->cariMenu . '%')
                ->orWhere('harga', 'like', '%' . $this->cariMenu . '%')
                ->paginate(10),
        ])
            ->layout('layouts.myview', [
                'title'     => 'pemesanan',
                'subtitle'  => 'invoice',
                'active'    => 'pemesanan.index'
            ]);
    }
}
