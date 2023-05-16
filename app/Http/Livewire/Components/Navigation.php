<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();

        return view('livewire.components.navigation', compact('categories'));
    }
}
