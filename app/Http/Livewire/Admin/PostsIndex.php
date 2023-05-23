<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    /**
     * Esta variable se encarga de buscar en la base de datos los posts que coincidan
     * con lo que se ingresa, lo que quiere decir que si el usuario ingresa un caracter
     * o una cadena de estos, segun esta busqueda trae los posts (segun el name) que
     * coincidan en la base de datos.
     */
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(15);
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
