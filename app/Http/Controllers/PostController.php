<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get(); //上と同じ分になる(新しい順)

        return view('index')
            ->with(['posts' => $posts]);
    }

    // idを引数として渡す
    public function show($id)
    {
        $post = Post::findOrFail($id);
        // showというviewを呼び出して、データを渡す
        return view('posts.show')
            ->with(['post' => $post]);
    }
}
