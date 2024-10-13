<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;


class CategoryProductController extends Controller
{
    public function index()
    {
        return CategoryProduct::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = CategoryProduct::create($request->all());
        return response()->json($category);
    }

    public function show($id)
    {
        return CategoryProduct::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return new CategoryResource($category);
    }
    

    public function update(Request $request, $id)
    {
        $category = CategoryProduct::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return new CategoryResource($category);
    }

    public function destroy($id)
    {
        $category = CategoryProduct::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        CategoryProduct::destroy($id);
        return response()->json(['message' => 'Category deleted']);
    }
}
