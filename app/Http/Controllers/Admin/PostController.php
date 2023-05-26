<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('models.admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('models.admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        //return Storage::put('public/posts', $request->file('file'));

        $post = Post::create($request->all());

        # Este IF es por si se agrega una imagen
        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            // Para relacionar la imagen al post
            $post->image()->create([
                'url' => $url,
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('info', __('The post was created!')); # Alerta estatica
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('models.admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories =  Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('models.admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        # Si se va a cambiar la imagen
        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            # Si el post ya tiene una imagen para eliminarla anterior
            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url,
                ]);
            } else {
                # Si el post no tenia una imagen, le crea una nueva
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        //  return redirect()->route('admin.categories.index')->with('info', __('The category was updated!')); # Alerta estatica
        return redirect()->route('admin.posts.index')->with('info', __('The post was updated!')); # Alerta estatica
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', __('The post was deleted!')); # Alerta estatica
    }
}
