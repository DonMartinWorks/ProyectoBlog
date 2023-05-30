<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

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
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate();
        return view('livewire.admin.users-index', compact('users'));
    }
}
