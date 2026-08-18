<?php

namespace App\Http\Livewire\Publications;

use App\Models\Publication;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Card extends Component
{
    public Publication $publication;
    public bool $newProject;
    public $beforeImage;
    public $afterImage;
    public $account;
    public $url;

    public function mount(Publication $publication)
    {
        $this->publication  = $publication;
        $this->newProject   = true;

        $this->beforeImage = config('custom.public_bucket_url') . '/projects/thumb/' . $this->publication->image_before;

        if ($this->publication->image_after) {
            $this->newProject = false;
            $this->afterImage = config('custom.public_bucket_url') . '/projects/thumb/' . $this->publication->image_after;
        }

        $this->account  = $this->publication->account;
    }

    public function render()
    {
        return view('livewire.publications.card');
    }
}
