<?php

namespace App\Models;

use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, AutoGenerateUuid;

    public $incrementing = false;
    protected $keyType   = 'string';

    protected $fillable = [
        'name',
        'email',
        'type',
        'description',
        'webpage',
        'nickname',
        'avatar',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function socialNetworks()
    {
        return $this->belongsToMany(SocialNetwork::class, 'company_social_networks', 'account_id', 'social_network_id')
            ->withPivot('url');
    }
}
