<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    //

    use SoftDeletes;

    protected $dates = ['deleted_at'];

  public function genre()
  {
      return $this->belongsTo('App\Models\Genre');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function comment()
  {
      return $this->hasMany('App\Models\Comment');
  }

}
