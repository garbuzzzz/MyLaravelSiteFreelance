<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
