<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(15);
        return response()->json([
            'status' => true,
            'message' => 'Show all data',
            'data' => $categories
        ]);
    }

    public function show($name)
    {
        $category = Category::findOrFail($name);
        return response()->json([
            'status' => true,
            'message' => 'Category found',
            'data' => $category
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category has been created',
            'data' => $category
        ]);
    }


    public function edit($name)
    {
        $category = Category::findOrFail($name);
        return response()->json([
            'status' => true,
            'message' => 'Category found',
            'data' => $category
        ]);
    }
}
