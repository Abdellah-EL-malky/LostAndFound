<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Commentaire ajouté!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', 'Commentaire supprimé!');
    }
}
