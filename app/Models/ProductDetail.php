<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
 // use HasFactory;
 protected $table ='product_detail';

 protected $guarded;

 public function image(){
    return $this->hasMany(ProductImage::class,'product_detail_id','id');
}
 
}