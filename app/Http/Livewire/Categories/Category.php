<?php

namespace App\Http\Livewire\Categories;

use App\Library\Constant;
use App\Models\Publication;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public $key;
    public $publicationRecomendations;
    public $category;

    public function render()
    {
        return view('livewire.categories.category', [
            'publications' => $this->getPublications()->paginate(10)
        ]);
    }

    public function mount($key)
    {
        try {
            $this->key      = $key;
            $this->category = Constant::CATEGORIES[$key];
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function getPublications()
    {
        $publications = Publication::with('account')->select('id', 'brand', 'image_before', 'image_after', 'subtitle', 'account_id', 'slug')
            ->where('category', $this->key);

        return $publications;
    }
}
