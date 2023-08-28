<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'pharmacist',
        'email',
        'pharmacy',
        'phone_number',
        'address',
        'password'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
