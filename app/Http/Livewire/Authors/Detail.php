<?php

namespace App\Http\Livewire\Authors;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class Detail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $author;

    public function render()
    {
        $publications = $this->author->publications()->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('livewire.authors.detail', [
            'publications' => $publications
        ]);
    }



    public function mount($author)
    {
        try {
            $this->author = User::whereHas('account', function ($query) use ($author) {
                $query->where('nickname', $author);
            })->firstOrFail();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('home');
        }
    }
}
