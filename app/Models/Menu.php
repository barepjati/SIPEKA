<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'kategori_id',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\DetailPemesanan');
    }
}
