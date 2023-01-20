<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with(
            'productImages', 
            'productVariants', 
            'productVariantPrices',
            'productVariantPrices.productVariantPriceOne:id,variant',
            'productVariantPrices.productVariantPriceTwo:id,variant',
            'productVariantPrices.productVariantPriceThree:id,variant'
        )->oldest('id')->paginate(5);
        // dd($products->toArray());
        return view('admin.product.index', compact('products') );
    }


}
