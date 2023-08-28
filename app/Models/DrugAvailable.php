<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugAvailable extends Model
{
    use HasFactory;
    protected $fillable = [
        'pharmacy_id',
        'name',
        'quantity',
        'actual_price',
        'doctor_gain',
        'selling_price'
    ];
}
