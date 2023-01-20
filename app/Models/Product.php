<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    //This field is reverse of $fillable
    protected $guarded = [];

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function productVariants(){
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function productVariantPrices(){
        return $this->hasMany(ProductVariantPrice::class, 'product_id');
    }


}
