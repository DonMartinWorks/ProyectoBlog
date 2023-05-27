<?php

namespace App\Http\Controllers\Models;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  Trae todos los posts que sean de STATUS = 2 (publicado)
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        return view('models.post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        /**
         * Traer todos los posts relacionados (segun la ID de category
         * y que su status sea 2 de publicado) desde la base de datos
         */

        // Solo trae los posts published
        $this->authorize('published', $post);

        $relateds = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('models.post.show', compact('post', 'relateds'));
    }

    /**
     * Bring the categories.
     */
    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(6);

        return view('models.post.category', compact('posts', 'category'));
    }

    /**
     * Bring the tags.
     */
    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(6);

        return view('models.post.tag', compact('posts', 'tag'));
    }
}
