<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Product;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $product = new Product([
        'title' => $request->get('title'),
        'picture' => $request->get('picture'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
        'qtd' => $request->get('qtd')
        ]);

        $product->save();

        return response()->json('success');
    }
    public function index()
    {
        return new PostCollection(Product::all());
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        $product->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return response()->json('successfully deleted');
    }
}
