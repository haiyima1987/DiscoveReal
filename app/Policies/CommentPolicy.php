<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User $user
     * @param  \App\Comment $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User $user
     * @param  \App\Comment $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || $user->isAdmin();
    }
}
