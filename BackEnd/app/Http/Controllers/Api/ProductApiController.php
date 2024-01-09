<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json(['msg' => 'Lấy dữ liệu thành công', 'data' => $product], 200);
    }
    public function getCategory()
    {
        $category = Category::all();
        return response()->json(['msg' => 'Lấy dữ liệu thành công', 'data' => $category], 200);
    }
}
