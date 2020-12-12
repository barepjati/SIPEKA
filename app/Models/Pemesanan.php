<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'no_transaksi',
        'nama',
        'status',
        'total',
        'user_id',
        'pelanggan_id',
        'alamat_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cart()
    {
        return $this->hasOne('App\Models\DetailPemesanan');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Models\Pelanggan');
    }

    public function alamat()
    {
        return $this->belongsTo('App\Models\Alamat');
    }
}
