<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price', 'price_new', 'status', 'intro', 'content', 'image', 'keywords', 'description', 'user_id', 'cate_id'];
    //public $timestamps = false;

    //mot product chi thuoc 1 cate
    public function category () {
    	return $this->belongTo('App\Models\Category');
    }
    //mot product chi duoc tao boi 1 user
    public function user () {
    	return $this->belongTo('App\Models\User');
    }
    //mot product co 1 or nhieu img
    public function product_image () {
        return $this->hasMany('App\Models\Product_image');
    }
    //mot product co 1 hoac nhieu order detail
    public function order_detail () {
        return $this->hasMany('App\Models\Order_detail');
    }

    public function product_size () {
        return $this->hasMany('App\Models\Product_size');
    }
}
