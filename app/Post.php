<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

  public function user() {

    return $this->belongsTo('App\User', 'created_by');

  }

  public function likes()
  {
    return $this->hasMany('App\Like');
  }

  public function getLikeCountAttribute()
  {
     return $this->likes()->where('like', 1)->count();
  }

  public function getUserCountAttribute()
  {
     return optional($this->likes()->where('user_id', auth()->user()->id)->first());
  }

  public function comments()
  {
      return $this->hasMany('App\Comment');
  }

  protected $fillable = [
      'title', 'description', 'iamge', 'url', 'created_by', 'updated_by'
  ];
  protected $primaryKey = 'id';
}
