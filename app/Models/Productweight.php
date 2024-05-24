<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productweight extends Model
{
    // use HasFactory;

    protected $table ='product_weight';

    protected $guarded;


    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function sub_category(){
        return $this->belongsTo(Subcategory::class);
    }
}
