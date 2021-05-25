<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['quantity', 'unit_price', 'size', 'product_id', 'order_id'];

    //mot bill detail chi thuoc ve 1 bill
    public function order () {
    	return $this->belongTo('App\Models\Order');
    }
    //mot bill detail chi co 1 procduct
    public function product () {
    	return $this->belongTo('App\Models\Product');
    }
}
