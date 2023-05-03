<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencyname extends Model
{
    use HasFactory;
    protected $fillable = [
        'currency_name'
    ];

    protected $primaryKey = 'id';
}
