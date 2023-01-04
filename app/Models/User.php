<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function canAccessFilament(): bool
    {
        return $this->hasRole('Admin');
    }

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
    ];

    public function pesanan()
    {
        $this->hasMany(Pesanan::class);
    }
}