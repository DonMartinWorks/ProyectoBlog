<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Filtra quien es el autor de un post.
     */
    public function author(User $user, Post $post)
    {
        # Confirma si el ID del usuario coincide con el que creo el post
        if ($user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Filtra los posts que no sean published.
     */
    public function published(?User $user, Post $post) // El usuario puede escoger si quiere estar logeado para ver un post.
    {
        if ($post->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
