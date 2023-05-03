<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'child_category', 'slug', 'icon', 'sub_category', 'category', 'status'
    ];

    protected $primaryKey = 'id';
}
