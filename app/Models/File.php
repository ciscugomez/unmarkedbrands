<?php

namespace App\Models;

use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory, AutoGenerateUuid;
    public $incrementing = false;
    protected $keyType = 'string';
}
