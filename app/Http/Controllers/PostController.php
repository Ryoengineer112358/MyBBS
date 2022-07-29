<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        'Title A',
        'Title B',
        'Title C',
    ];

    public function index()
    {
        return view('index')
            ->with(['posts' => $this->posts]);
    }

    // idを引数として渡す
    public function show($id)
    {
        // showというviewを呼び出して、データを渡す
        return view('posts.show')
            ->with(['post' => $this->posts[$id]]);
    }
}
