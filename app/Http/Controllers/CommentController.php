<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{

    public function store(Request $request, $post){

        $request->validate([
            'comment' => 'required|max:500',
        ]);

        $comment = new Comment();
            
        $comment->post_id = $post;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;

        $comment->save();

        session()->flash('comment-posted-message', 'Your comment was posted.');

        return back();
    }

    public function destroy($id){

        $comment = Comment::findOrFail($id);

        $comment->delete();

        session()->flash('comment-deleted-message', 'Your comment was deleted.');

        return back();
    }
}
