<?php

namespace App\Http\Controllers\Post;

use App\Post;
use App\User;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * View all post
     *
     * @return void
     */
    public function index()
    {
       $posts = Post::get();
       return view('post.index', ['posts' => $posts]);
    }

    public function openDetailsPage($id){
      $post = Post::find($id);
      return view('details-page', compact('post'));
    }
}
