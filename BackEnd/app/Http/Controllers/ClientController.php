<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $title = "Home";
        $products = Product::all();
        return view('client.home', compact('products', 'title'));
    }
    public function show($id)
    {
        $variant = Variant::where('product_id', $id)->get();
        $size = Size::all();
        $color = Color::all();
        $product = Product::find($id);
       
        return view('client.detail', compact('color', 'size', 'product', 'variant'));
    }
}
