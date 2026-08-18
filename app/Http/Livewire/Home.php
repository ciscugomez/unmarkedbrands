<?php

namespace App\Http\Livewire;

use App\Models\Publication;
use Livewire\Component;

class Home extends Component
{
    public $recentPublications;
    public $featuredPublications;

    public function render()
    {
        return view('livewire.home');
    }

    public function mount(){

        $this->featuredPublications     = Publication::withCount('likes')->whereHas('likes')->orderByDesc('likes_count')->take(6)->get();
        $ids                            = $this->featuredPublications->pluck('id')->toArray();
        $this->recentPublications       = Publication::orderBy('created_at', 'desc')->whereNotIn('id', $ids)->take(6)->get();
    }
}
