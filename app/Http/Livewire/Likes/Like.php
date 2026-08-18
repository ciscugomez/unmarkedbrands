<?php

namespace App\Http\Livewire\Likes;

use Livewire\Component;

class Like extends Component
{
    public $likeable;
    public $likes;
    public $user;
    public $liked;

    public function render()
    {
        return view('livewire.likes.like');
    }

    public function mount($likeable, $user)
    {
        $this->likeable = $likeable;
        $this->likes    = $this->likeable->likes->count();
        $this->user     = $user;
        if ($this->user == null) {
            $this->liked = false;
        } else {
            $this->liked = $this->likeable->likes->where('user_id', $this->user->id)->count() > 0;
        }
    }

    public function toggleLike(){
        if ($this->liked) {
            $this->user->likes()->where('likeable_id', $this->likeable->id)->where('likeable_type', get_class($this->likeable))->delete();
            $this->likes--;
            $this->liked = false;
        } else {
            $this->likeable->likes()->create([
                'user_id' => $this->user->id,
            ]);
            $this->likes++;
            $this->liked = true;
        }
    }
}
