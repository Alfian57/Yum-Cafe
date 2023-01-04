<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'masakan';

    public function detailPesanan()
    {
        $this->belongsTo(DetailPesanan::class);
    }
}