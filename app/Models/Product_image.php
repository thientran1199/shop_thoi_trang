<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = ['image', 'product_id'];

    public function product () {
    	return $this->belongTo('App\Models\Product');
    }
}
