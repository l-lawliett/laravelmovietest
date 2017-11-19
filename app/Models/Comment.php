<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function films()
    {
        return $this->belongsTo('App\Models\Films');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
