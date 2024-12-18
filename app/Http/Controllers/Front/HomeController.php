<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('front.home.index', [
            'latest_post' => Article::latest()->first(),
            'article' => Article::with('Category')
            ->where('status', 1)
            ->latest()
            ->paginate(5),
            'categories' => Category::latest()->get()
        ]);
    }
}
