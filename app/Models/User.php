<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\AutoGenerateUuid;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, AutoGenerateUuid;

    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'account_id',
        'image',
        'default_image',
        'uuid',
        'email_verified_at',
        // 'social_id',
        // 'social_provider',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function publications(){
        return $this->hasMany(Publication::class, 'creator_id');
    }

    public function temporaryImage(){
        if (!$this->default_image) {
            return Storage::disk('s3')->temporaryUrl(
                'unmarked/profile/'.$this->image,
                now()->addMinutes(5)
            );
        }else{
            return asset('profile/'.$this->image);
        }

    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->with('responses');
    }
}
