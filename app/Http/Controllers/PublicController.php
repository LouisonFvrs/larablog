<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * retourne la view des articles d'un utilisateur
     */
    public function index(User $user)
    {
        $articles = Article::where('user_id', $user->id)->where('draft', 0)->get();

        return view('public.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }

    /**
     * @param User $user
     * @param Article $article
     * @return string
     *  Affiche l'article d'un utilisateur
     */
    public function show(User $user, Article $article)
    {
        if($article->draft != 0) return view('welcome');
        return view('public.show', ['article' => $article]);
    }

    public function home() {
        $articles = Article::orderByDesc('like')
            ->paginate(6);
        return view('welcome', ['articles' => $articles]);
    }
}
