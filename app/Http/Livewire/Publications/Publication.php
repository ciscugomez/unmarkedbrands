<?php

namespace App\Http\Livewire\Publications;

use App\Models\Account;
use App\Models\Publication as ModelPublication;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Publication extends Component
{
    public ModelPublication $publication;
    public bool $newProject;

    public $beforeImage;
    public $afterImage;
    public $content;
    public $account;
    public $featuredPublications;

    public function mount($account, $slug)
    {
        $this->account = Account::where('nickname', $account)->first();
        if ($this->account && $this->account->publications->contains('slug', $slug)) {
            $this->publication = ModelPublication::where('slug', $slug)->first();
            $this->newProject = true;
            $this->beforeImage = config('custom.public_bucket_url') . '/projects/' . $this->publication->image_before;

            if ($this->publication->image_after) {
                $this->newProject = false;
                $this->afterImage = config('custom.public_bucket_url') . '/projects/' . $this->publication->image_after;
            } else {
            }

            $this->account = $this->publication->account;
            $this->content = json_decode($this->publication->content, true);
            $this->featuredPublications = ModelPublication::whereHas('likes')->whereNot('id', $this->publication->id)->orderBy('created_at', 'desc')->take(4)->get();
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.publications.publication', [
            'contents' => $this->content
        ]);
    }

    public function deletePublication()
    {

        $imagesToDelete = $this->getImagesToDelete();

        $this->publication->delete();

        foreach ($imagesToDelete as $key => $value) {
            $this->removeImages('projects/' . $value);
            $this->removeImages('originals/' . $value);
            $this->removeImages('projects/thumb/' . $value);
        }

        return redirect()->route('home');
    }

    public function getImagesToDelete()
    {
        $imagesToDelete = [];

        array_push($imagesToDelete, $this->publication->image_before);
        if ($this->publication->image_after) {
            array_push($imagesToDelete, $this->publication->image_after);
        }

        foreach ($this->content as $items) {
            $type = $items['type'];
            if ($type == 'image') {
                foreach ($items['value'] as $key => $value) {
                    array_push($imagesToDelete, $value);
                }
            }
        }

        return $imagesToDelete;
    }

    public function removeImages($url)
    {
        if (Storage::disk('s3')->exists($url)) {
            Storage::disk('s3')->delete($url);
        }
    }
}
