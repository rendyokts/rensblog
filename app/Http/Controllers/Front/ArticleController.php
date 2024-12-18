<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show($slug){
        $article = Article::whereSlug($slug)->firstOrFail();
        $article->increment('views');
        return view("front.article.show",[
            'article' => $article,
            'categories' => Category::latest()->get(),
        ]);
    }

    public function index(){
        $keyword = request()->keyword;
        if($keyword){
            $article = Article::with('Category')
            ->where('status', 1)
            ->where('title','like', '%' .$keyword. '%')
            ->latest()
            ->paginate(5);
        }else {
            $article = Article::with('Category')
            ->where('status', 1)
            ->latest()
            ->paginate(5);
        }
        return view("front.article.index",[
            'articles' => $article,
            'keyword' => $keyword
        ]);
    }
}
