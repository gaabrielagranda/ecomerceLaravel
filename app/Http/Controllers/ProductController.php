<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all(); //get all products
        return view('product.index', compact('products')); //return view with products. Compact is used to pass the products to the view

    }
    public function show($id){
        $product = Product::findOrFail($id); //get product by id and findOrFail is used to get the product by id and if not found, it throws an exception
        return view('product.show', compact('product')); //return view with product
    }
}
