<?php

namespace App\Http\Livewire\Publications;

use App\Library\Constant;
use App\Models\Publication;
use Livewire\Component;
use Livewire\WithPagination;

class Query extends Component
{
    use WithPagination;
    public $query;
    public $publicationRecomendations;

    public function render()
    {
        return view('livewire.publications.query', [
            'publications' => $this->getPublications()->paginate(12)
        ]);
    }

    public function mount($query)
    {
        $this->query                        = $query;
        $this->publicationRecomendations    = Publication::take(6)->get();
    }

    public function getPublications()
    {
        $categoryCode = array_search($this->query, Constant::CATEGORIES);

        $publications = Publication::select('id', 'brand', 'image_before', 'image_after', 'subtitle', 'slug', 'account_id')
            ->where('title', 'like', '%' . $this->query . '%')
            ->orWhere('subtitle', 'like', '%' . $this->query . '%')
            ->orWhere('brand', 'like', '%' . $this->query . '%')
            ->orWhere('content', 'like', '%' . $this->query . '%');
        return $publications;
    }
}
