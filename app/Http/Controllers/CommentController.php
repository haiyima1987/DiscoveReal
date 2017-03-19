<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class CommentController extends Controller
{
    public function publishComment(CommentRequest $request, Post $post)
    {
        $userId = Session::get('id');
        $comment = new Comment([
            'post_id' => $post->id,
            'user_id' => $userId,
            'datetime' => Carbon::now(),
            'title' => $request->title,
            'content' => Purifier::clean($request->input('content'))
        ]);

        if ($comment->save()) {
            return redirect()->route('post.view', $post);
        } else {
            return redirect()->back();
        }
    }
}
