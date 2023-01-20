<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantPrice extends Model
{
    use HasFactory;
     
    //This field is reverse of $fillable
    protected $guarded = [];


    public function productVariantPriceOne(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_one', 'id');
    }

    public function productVariantPriceTwo(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_two', 'id');
    }

    public function productVariantPriceThree(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_three', 'id');
    }


}
