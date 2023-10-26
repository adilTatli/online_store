<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.index', compact('products'));
    }
}
