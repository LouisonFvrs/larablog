<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function like ($id) {
        Article::where('id', $id)->increment('like');
        return redirect()->back();
    }
}
