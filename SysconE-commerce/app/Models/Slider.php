<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'img', 's_title', 's_description', 'button_link', 'serial', 'status' 
    ];

    protected $primaryKey = 'id';
}
