<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $type = "string";

    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'message',
    ];

    public function responses()
    {
        return $this->morphMany(Comment::class, "commentable");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
