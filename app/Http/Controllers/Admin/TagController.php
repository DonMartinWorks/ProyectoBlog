<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Niega el acceso al usuario que no tenga los permisos, para realizar culaquiera de estas acciones
     */
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('models.admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = [
            'red' => __('Red Color'),
            'yellow' => __('Yellow Color'),
            'green' => __('Green Color'),
            'blue' => __('Blue Color'),
            'indigo' => __('Indigo Color'),
            'purple' => __('Purple Color'),
            'pink' => __('Pink Color'),
            'rose' => __('Rose Color'),
            'teal' => __('Teal Color'),
            'orange' => __('Orange Color'),
            'sky' => __('Sky Color'),
            'lime' => __('Lime Color'),
        ];

        return view('models.admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('admin.tags.index')->with('info', __('The tag was created!')); # Alerta estatica
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => __('Red Color'),
            'yellow' => __('Yellow Color'),
            'green' => __('Green Color'),
            'blue' => __('Blue Color'),
            'indigo' => __('Indigo Color'),
            'purple' => __('Purple Color'),
            'pink' => __('Pink Color'),
            'rose' => __('Rose Color'),
            'teal' => __('Teal Color'),
            'orange' => __('Orange Color'),
            'sky' => __('Sky Color'),
            'lime' => __('Lime Color'),
        ];

        return view('models.admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('admin.tags.index')->with('info', __('The tag was updated!')); # Alerta estatica;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', __('The tag was deleted!')); # Alerta estatica;
    }
}
