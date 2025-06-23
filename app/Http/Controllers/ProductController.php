<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        return view('products', compact('products'));
    }

    public function search(Request $request)
    {
        $term = $request->get('term');

        $products = Product::query()
            ->where('name', 'LIKE', '%' . $term . '%')
            ->get();

        return response()->json($products);
    }
}
