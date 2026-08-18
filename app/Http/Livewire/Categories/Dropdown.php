<?php

namespace App\Http\Livewire\Categories;

use App\Library\Constant;
use App\Models\Publication;
use Livewire\Component;

class Dropdown extends Component
{
    public $categories;
    public function render()
    {
        return view('livewire.categories.dropdown');
    }

    public function mount()
    {
        // Obtén las categorías en uso de las publicaciones
        $categoriesInUse = Publication::pluck('category')->toArray();

        // Filtra las categorías disponibles según las categorías en uso
        $this->categories = array_intersect_key(Constant::CATEGORIES, array_flip($categoriesInUse));

    }
}
