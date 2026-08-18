<?php

namespace App\Http\Livewire\Publications;

use App\Models\Publication;
use Livewire\Component;
use Livewire\WithPagination;

class PublicationList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $title;
    public $type;

    public function render()
    {
        if ($this->type == 'recientes') {
            $publications = Publication::with('likes')->select('id', 'title', 'subtitle', 'slug', 'account_id', 'image_before', 'image_after', 'creator_id')->orderBy('created_at', 'desc');
        } elseif ($this->type == 'destacados') {
            $publications     = Publication::withCount('likes')->whereHas('likes')->orderByDesc('likes_count');
        }
        return view(
            'livewire.publications.publication-list',
            [
                'publications' => $publications->paginate(24)
            ]
        );
    }

    public function mount($type)
    {
        $this->type = $type;

        if ($type == 'recientes') {
            $this->title = 'Proyectos recientes';
        } elseif ($type == 'destacados') {
            $this->title = 'Proyectos destacados';
        } else {
            abort(404);
        }
    }
}
