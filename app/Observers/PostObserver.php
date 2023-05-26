<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        /*
        Este metodo se activa antes de crea un post para asociar el post con el
        ID del usuario, para no tener que enviar este dato con un input HIDDEN

        Ademas esta configurado para ignorar este comando, si no se ejecuta desde la consola CMD
        */

        if (! \App::runningInConsole()) {
            # Solo se activa si no se ejecuta desde la consola, si es este caso funciona con el duo de FACTORY/SEEDER
            $post->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "deleting" event.
     */
    public function deleting(Post $post): void
    {
        // Este evento se activa antes de eliminar un post, para eliminar antes la imagen
        #  PostObserver se encraga de eliminar la imagen
        if ($post->image) {
            Storage::delete($post->image->url);
        }
    }
}
