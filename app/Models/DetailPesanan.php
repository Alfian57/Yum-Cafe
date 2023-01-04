<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'detail_pesanan';

    public function pesanan()
    {
        $this->belongsTo(Pesanan::class);
    }

    public function masakan()
    {
        $this->belongsTo(Masakan::class);
    }
}