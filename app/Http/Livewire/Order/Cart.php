<?php

namespace App\Http\Livewire\Order;

use App\Models\DetailPemesanan;
use App\Models\Menu;
use App\Models\Pemesanan;
use Livewire\Component;
use Livewire\WithPagination;

class Cart extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariMenu, $pemesananId, $no_transaksi, $status, $nama, $total, $cart, $kembali = 0;

    protected $rules = [
        'nama' => 'required|min:2',
    ];

    protected $messages = [
        'nama.required' => 'Field Nama tidak boleh kosong.',
        'nama.min'      => 'Field Nama Minimal 2 karakter.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function pemesanan()
    {
        $this->validate();

        $pemesanan = Pemesanan::create([
            'nama' => $this->nama,
            'no_transaksi' => (string) \Str::uuid(),
            'total' => 0,
            'user_id' => \Auth::user()->id
        ]);

        // $pemesananId, $no_transaksi, $status, $nama, $total, $cart

        $this->pemesananId = $pemesanan->id;
        $this->no_transaksi = $pemesanan->no_transaksi;
        $this->status = $pemesanan->status;
        $this->namaPemesan = $pemesanan->nama;
        $this->total = $pemesanan->total;

        $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $this->nama . ' Berhasil Ditambah.']);
    }

    public function tambahCart($id)
    {
        $menu = Menu::where('id', $id)->first();
        $ada = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('menu_id', $id)
            ->exists();
        // dd($this->pemesanId);
        if ($this->pemesananId) {
            if ($ada) {
                $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                $this->emit('alert', ['type'  => 'error', 'message' =>  'Data ' . $menu->nama . ' Sudah Ditambahkan.']);
            } else {
                DetailPemesanan::create([
                    'transaksi_id'  => $this->pemesananId,
                    'menu_id'       => $id,
                    'kuantitas'     => 1,
                    'harga'         => $menu->harga
                ]);
                $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                $this->total = $this->total + $menu->harga;
                $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $menu->nama . ' Berhasil Ditambah.']);
            }
        } else {
            $this->emit('alert', ['type'  => 'error', 'message' =>  'Silakan inputkan Nama']);
        }
    }

    public function increment($id)
    {
        $target = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('id', $id)
            ->first();

        $target->update([
            'kuantitas' => $target->kuantitas + 1,
            'harga'     => $target->harga + $target->menu->harga
        ]);

        $this->total = $this->total + $target->menu->harga;
        $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
    }

    public function decrement($id)
    {
        $target = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('id', $id)
            ->first();

        $target->update([
            'kuantitas' => $target->kuantitas - 1,
            'harga'     => $target->harga - $target->menu->harga
        ]);

        $this->total = $this->total - $target->menu->harga;
        $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
    }

    public function destroy($id)
    {
        $target = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('id', $id)
            ->first();
        $target->delete();
        $this->total = $this->total - $target->harga;
        $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $target->menu->nama . ' Berhasil dihapus dari daftar pemesanan.']);
    }

    public function render()
    {
        return view('livewire.order.cart', [
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
