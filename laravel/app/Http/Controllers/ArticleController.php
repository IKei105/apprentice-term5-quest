<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id', 'asc') // IDの昇順で並び替え
                            ->limit(5) // 先頭5件を取得
                            ->get();
        
        $count = Article::count(); // 件数を直接取得

        if($count > 5) {
            $articlePageCount = ceil($count / 5);
        } else {
            $articlePageCount = 1;
        }

        return view('home')->with(['articles' => $articles, 'articlePageCount' => $articlePageCount, 'pageIndex' => 1]);
    }

    public function indexPage($id)
    {   
        $showArticleNum = ($id - 1) * 5;
        $articles = Article::orderBy('id', 'asc') // IDの昇順で並び替え
        ->skip($showArticleNum) // 先頭5件をスキップ
        ->take(5) // 次の5件を取得
        ->get();

        $count = Article::count(); // 件数を直接取得

        if($count > 5) {
            $articlePageCount = ceil($count / 5);
        } else {
            $articlePageCount = 1;
        }

        return view('home')->with(['articles' => $articles, 'articlePageCount' => $articlePageCount, 'pageIndex' => $id]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $article = article::find($id);
        
        return view('/edit')->with(['id'=>$id, 'article' => $article]);
    }

    public function register(Request $request)
    {
        $article = new Article();
        $article->userid = session('user_id');
        $article->title = $request->title;
        $article->about = $request->about;
        $article->article = $request->article;
        $article->tag = $request->tag;

        $article->save();

        return redirect('/home');
    }

    public function Article($id)
    {
        $article = article::find($id);
        return view('article')->with(['article' => $article]);
    }

    public function update($id, Request $request)
    {
        $article = article::find($id);
        $article->title = $request->title;
        $article->about = $request->about;
        $article->article = $request->article;
        $article->tag = $request->tag;

        $article->save();

        return redirect()->route('article', ['id' => $id]);
    }

    //記事を削除するメソッド
    public function delete($id)
    {
        $article = article::find($id);
        $article->delete();

        return redirect()->route('home');
    }

    //登録するメソッド
    public function signUp()
    {
        
    }

}
