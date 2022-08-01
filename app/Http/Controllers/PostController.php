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

    // idを引数として渡す Implicit Binding
    public function show(Post $post)
    {
        // showというviewを呼び出して、データを渡す
        return view('posts.show')
            ->with(['post' => $post]);
    }

    public function create()
    {
        //viewを呼ぶ
        return view('posts.create');
    }

    //フォームから送信されたデータは、ここでRequest型の$requestでまとめて受け取ることができるため
    //ここでデータを作って保存する
    public function store(Request $request)
    {
        //入力された値を検証するためのルールを設定
        //ルールに合致しなかった場合、エラーの情報と共に元のページに戻してくれる
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ], [
            'title.required' => 'タイトルは必須です',
            'title.min' => ':min 文字以上入力してください',
            'body.required' => '本文は必須です',
        ]);

        //Postのインスタンスを作る
        $post = new Post();

        //プロパティに値をセットする
        $post->title = $request->title;
        $post->body = $request->body;

        //DBに値を保存
        $post->save();

        //保存したら一覧に戻る
        return redirect()
            ->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }
}
