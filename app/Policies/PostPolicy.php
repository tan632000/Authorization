<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        //
    }

    public function create(User $user)
    {
        return $user->hasAccess(['post.create']);
    }

    public function update(User $user, Post $post)
    {
        return $user->hasAccess(['post.update']) || $user->id == $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        //
    }

    public function publish(User $user)
    {
        return $user->hasAccess(['post.publish']);
    }

    public function draft(User $user)
    {
        return $user->inRole('editor');
    }
}