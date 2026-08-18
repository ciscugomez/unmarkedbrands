<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SocialNetwork extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'icon',
        'url',
    ];

    public function temporaryImage(){
        return Storage::disk('s3')->temporaryUrl('unmarked/social-networks/'.$this->icon, now()->addMinutes(5));
    }
}
