<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'meja';

    public function pesanan()
    {
        $this->hasMany(Pesanan::class);
    }
}