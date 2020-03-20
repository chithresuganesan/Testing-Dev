<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Like;
use App\Post;

class LikeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

   public function index(Post $post)
   {
     $user = auth()->user()->id;
     $like_count = app('request')->like_count;

      $flight = Like::updateOrCreate([
        'user_id' => $user, 'post_id' => $post->id],
        ['like' => $like_count]);

      return back();

   }
}
