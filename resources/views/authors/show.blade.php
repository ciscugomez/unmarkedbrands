<x-app-layout>
    @livewire('authors.show', [
        'author' => $author->account->nickname,
    ])
</x-app-layout>
