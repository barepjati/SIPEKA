<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'kuantitas',
        'harga',
        'menu_id',
        'transaksi_id'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function pemesanan()
    {
        return $this->belongsTo('App\Models\Pemesanan');
    }
}
