<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    // /**
    //  * Create a new policy instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }
    public function view(User $user, Post $post)
    {
        return $user-id == $post->user_id;
    }
}
