<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    public function store(Article $article, CommentStoreRequest $request)
    {
        $validated = $request->validated();

        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $article->id,
            'content' => $validated['comment']
        ]);

        session()->flash('success', 'Din kommentar er blevet oprettet.');

        return redirect()->route('pages.articles.show', ['article' => $article]);
    }

    public function destroy(Comment $comment)
    {

        if ($comment->user_id != 6) {
            abort(403);
        }

        $comment->delete();

        session()->flash('success', 'Din kommentar er blevet slettet.');

        return redirect()->route('pages.articles.show', ['article' => $comment->article]);
    }
}
