<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Deal extends Model
{
    protected $fillable = [
        'title', 'description', 'img',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->hasOne('App\Comment');
    }
}
