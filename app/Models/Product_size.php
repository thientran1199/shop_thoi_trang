<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $fillable = ['size', 'product_id'];
    //public $timestamps = false;

    public function product () {
    	return $this->belongTo('App\Models\Product');
    }
}
