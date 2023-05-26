<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleting" event.
     */
    public function deleting(Post $post): void
    {
        // Este evento se activa antes de elijminar un post, para eliminar antes la imagen
        #  PostObserver se encraga de eliminar la imagen
        if ($post->image) {
            Storage::delete($post->image->url);
        }
    }
}
