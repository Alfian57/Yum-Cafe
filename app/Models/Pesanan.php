<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pesanan';

    protected $casts = [
        'tanggal_pesanan' => 'datetime',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function meja()
    {
        $this->belongsTo(Meja::class);
    }

    public function detailPesanan()
    {
        $this->hasMany(DetailPesanan::class);
    }
}