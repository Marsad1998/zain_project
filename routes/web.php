<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');

    return Brand::with('products')->where('id', 11)->get();
    return Product::with(['brand', 'category'])->where('id', '2')->get();
});
