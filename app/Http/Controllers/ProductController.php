<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);

        return response()->json(['status' => true, 'data' => $products]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return response()->json(['status' => true, 'message' => 'Product found', 'data' => $product]);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product has been added',
            'data' => $product
        ]);
    }

    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->delete();

        return response()->json(['status' => true, 'message' => 'Product has been deleted', 'data' => $product]);
    }
}
