<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function index() {
        $products = Product::join('category', 'product.cat_id', '=', 'category.id')
                    ->select('product.*', 'category.name as cat_name')
                    ->get();
        return view('admin.product', ['products' => $products]);
    }

    public function add() {
        $cats = Category::all();
        return view('admin.add-product', ['cats' => $cats]);
    }

    public function edit($id) {
        $cats = Category::all();
        $product = Product::join('category', 'product.cat_id', '=', 'category.id')
                   ->select('product.*', 'category.name as cat_name')
                   ->where('product.id', $id)
                   ->first();

        return view('admin.edit', ['row' => $product, 'cats' => $cats]);
    }
}
