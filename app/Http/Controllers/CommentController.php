<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * Ajouter un commentaire
     */
    public function store(Request $request, Article $article) {
        if (Auth::check()) {
            $data = $request->only(['content']);
            $data['user_id'] = Auth::user()->id;
            $data['article_id'] = $article->id;
            Comment::create($data);
            return back()->with('success', 'Commentaire ajouté avec succès!');
        }

        return redirect()->back();
    }
}
