<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'alias', 'parent_id', 'keywords', 'description'];

    //mot cate co mot hoac nhieu product
    public function product () {
    	return $this->hasMany('App\Models\Product');
    }
}
