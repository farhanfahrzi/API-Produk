<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // kategori harus ada
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        $product = Product::create($request->all());

        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('foto',$image);
        $product->image = url('foto/'.$image);
        $product->save();

        return response()->json($product);
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Product deleted']);
    }
}
