<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(15);
        return response()->json([
            'status' => true,
            'message' => 'Show all data',
            'data' => $brands
        ]);
    }

    public function show($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        return response()->json([
            'status' => true,
            'message' => 'Brand found',
            'data' => $brand
        ]);
    }

    public function store(Request $request)
    {
        $brand = Brand::create([
            'name' => $request->name
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Brand has been created',
            'data' => $brand
        ]);
    }


    public function edit($name)
    {
        $brand = Brand::findOrFail($name);
        return response()->json([
            'status' => true,
            'message' => 'Brand found',
            'data' => $brand
        ]);
    }

    public function update(Request $request, $id)
    {
    }
}
