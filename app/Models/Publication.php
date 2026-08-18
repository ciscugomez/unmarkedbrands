<?php

namespace App\Models;

use App\Library\Constant;
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Publication extends Model
{
    use HasFactory, AutoGenerateUuid;


    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'brand',
        'title',
        'subtitle',
        'image_before',
        'image_after',
        'category',
        'agency',
        'content',
        'brand_created_at_year',
        'brand_created_at_month',
        'creator_id',
        'account_id',
        'slug',
        'webpage',
    ];

    protected $casts = [
        'brand_created_at_year'     => 'integer',
        'brand_created_at_month'    => 'integer',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function category()
    {
        if ($this->category == null || $this->category == '') {
            return null;
        }
        return Constant::CATEGORIES[$this->category];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getImage($path)
    {
        return config('custom.public_bucket_url') . $path;
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->with('user');
    }
}
