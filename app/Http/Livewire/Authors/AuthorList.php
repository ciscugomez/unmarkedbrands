<?php

namespace App\Http\Livewire\Authors;

use App\Library\Constant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorList extends Component
{
    use WithPagination;
    public $alphabets;
    public $selectedAlphabet;

    public function render()
    {
        if ($this->selectedAlphabet != 'ALL') {
            $authors = User::with('account')->whereHas('account', function($query){
                $query->where('name', 'like', $this->selectedAlphabet . '%');
            })->whereNotNull('email_verified_at')
                ->paginate(18);
        }else{
            $authors = User::with('account')->whereHas('account')->whereNotNull('email_verified_at')
                ->paginate(18);
        }

        return view('livewire.authors.author-list', [
            'authors' => $authors
        ]);
    }

    public function mount()
    {
        $this->alphabets            = Constant::ALPHABET;
        $this->selectedAlphabet     = 'ALL';
    }

    public function filterByAlphabet($alphabet)
    {
        $this->selectedAlphabet = $alphabet;
        $this->resetPage();
    }
}
