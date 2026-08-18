<?php

namespace App\Http\Livewire\Comments;

use App\Models\Comment as ModelsComment;
use Livewire\Component;

class Comment extends Component
{
    public $model;
    public $message;
    public $user;
    public $modelClassName;
    public $comments;

    public $rules = [
        'message' => 'required|min:2'
    ];

    public function mount($id, $modelClassName)
    {
        // Resuelve la clase del modelo
        $this->model            = app()->make($modelClassName)->find($id);
        $this->modelClassName   = $modelClassName;
        $this->user             = auth()->user();
        $this->getComments();
    }

    public function render()
    {
        return view('livewire.comments.comment');
    }

    public function saveComment()
    {
        $this->validate();
        ModelsComment::create([
            'user_id'           => $this->user->id,
            'commentable_id'    => $this->model->id,
            'commentable_type'  => $this->modelClassName,
            'message'           => $this->message
        ]);

        $this->message = '';
        $this->getComments();
    }

    public function deleteComment($comment)
    {
        $comment = ModelsComment::find($comment);
        $comment->responses()->delete();
        $comment->delete();
        $this->getComments();
    }

    public function responseComment($id)
    {
        $this->validate();
        $comment = ModelsComment::find($id);
        if ($comment) {
            $comment->responses()->create([
                'user_id'           => $this->user->id,
                'message'           => $this->message
            ]);
        }

        $this->message = '';
        $this->getComments();
    }

    public function getComments(){
        $this->comments = ModelsComment::where('commentable_id', $this->model->id)
            ->where('commentable_type', $this->modelClassName)
            ->with('user')
            ->with('responses')
            ->get();
    }
}
