<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the post "saving" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function saving(Post $post)
    {
        $post->slug = str_slug($post->title);
    }
    /**
     * Handle the post "deleting" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        $post->comments()->delete();
    }
    // /**
    //  * Handle the Post "created" event.
    //  */
    // public function created(Post $post): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Post "updated" event.
    //  */
    // public function updated(Post $post): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Post "deleted" event.
    //  */
    // public function deleted(Post $post): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Post "restored" event.
    //  */
    // public function restored(Post $post): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Post "force deleted" event.
    //  */
    // public function forceDeleted(Post $post): void
    // {
    //     //
    // }
}
