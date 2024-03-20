<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class catController extends Controller
{
    

    public function index() {
        $categories = Category::all();
        
        return view('admin.category', ['cat' => $categories]);
    }
}
