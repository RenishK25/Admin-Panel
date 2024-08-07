<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $table ='products';

    protected $guarded;
    
    public function brand(){
        return $this->belongsTo(Productbrand::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function sub_category(){
        return $this->belongsTo(Subcategory::class);
    }
    

}
