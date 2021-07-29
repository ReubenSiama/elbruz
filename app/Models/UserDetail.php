<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact',
        'locality',
        'landmark',
        'city',
        'pin_code',
        'state',
    ];

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = auth()->user()->id;
    }
}
