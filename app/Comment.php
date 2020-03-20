<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
      'comment', 'post_id', 'user_id', 'author_id'
  ];

  protected $primaryKey = 'comment_id';


  public function user()
  {
    return  $this->belongsTo('App\User');
  }
}
