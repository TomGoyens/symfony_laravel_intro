<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TestController extends Controller
{
    public function index($slug){
      $article = Article::where('id', $slug)->first();
      // dd($article->articleName);
      return view('test', [
        'article' => $article
        ]);
    }
}
