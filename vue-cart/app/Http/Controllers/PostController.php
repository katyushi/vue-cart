<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post([
        'title' => $request->get('title'),
        'picture' => $request->get('picture'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
        'qtd' => $request->get('qtd')
        ]);

        $post->save();

        return response()->json('success');
    }
}
