<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class CommentController extends Controller
{
    public function publishComment(CommentRequest $request, Post $post)
    {
        $userId = Auth::id();
        $comment = new Comment([
            'post_id' => $post->id,
            'user_id' => $userId,
            'datetime' => Carbon::now(),
            'title' => $request->title,
            'content' => Purifier::clean($request->input('content'))
        ]);

        if ($comment->save()) {
            $notification = ['toasterMsg' => "Successfully Published Comment: " . ucwords($comment->title),
                'alert-type' => 'success'];
            return redirect()->route('post.view', $post)->with($notification);
        } else {
            $notification = ['toasterMsg' => "Failed to Publish Comment: " . ucwords($comment->title),
                'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
    }

    public function editComment(Comment $comment)
    {
        return view('post.editComment', compact('comment'));
    }

    public function updateComment(CommentRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $result = $comment->update([
            'title' => $request->title,
            'content' => $request->input('content')
        ]);

        $notification = null;
        if ($result) {
            $notification = ['toasterMsg' => "Successfully Updated Comment: " . ucwords($comment->title),
                'alert-type' => 'success'];
        } else {
            $notification = ['toasterMsg' => "Failed to Update Comment: " . ucwords($comment->title),
                'alert-type' => 'error'];
        }

        $post = $comment->post;
        return redirect()->route('post.view', $post)->with($notification);
    }

    public function removeComment(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $result = $comment->delete();
        $notification = null;
        if ($result) {
            $notification = ['toasterMsg' => "Successfully Removed Comment: " . ucwords($comment->title),
                'alert-type' => 'success'];
        } else {
            $notification = ['toasterMsg' => "Failed to Remove Comment: " . ucwords($comment->title),
                'alert-type' => 'error'];
        }

        $post = $comment->post;
        return redirect()->route('post.view', $post)->with($notification);
    }
}
