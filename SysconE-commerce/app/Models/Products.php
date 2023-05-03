<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'img', 'banner_img', 'short_name', 'p_name', 'slug', 'model_no',
        'category', 'sub_category', 'child_category', 'brand', 'purchase_scane',
        'sku', 'unit', 'price', 'offer_price', 'minimum_stock', 'video_link',
        'short_description', 'long_description', 'tag', 'product_return', 'warranty',
        'seo_title', 'seo_description', 'status' 
    ];

    protected $primaryKey = 'id';
}
