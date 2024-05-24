<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeColor extends Model
{
 // use HasFactory;
 protected $table ='product_size_color';

 protected $guarded;

 public function detail(){
    return $this->hasMany(Product::class,'id','product_id');
}

}