<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Like;
use App\Address;

class MainController extends Controller
{

  public function openDetailsPage($post_id){
    $post = Post::find($post_id);
    $comment = Comment::get();
    $User = User::get();
    return view('details-page', compact('post', 'comment', 'User'));
  }

  public function openDummy(){
    return view('dummy');
  }

  public function viewTestPage()
  {
    $users = User::all();
    $posts = Post::all();
    $addresses = Address::all();
    return view('test', ['posts' => $posts, 'users' => $users, 'addresses' => $addresses]);
  }

}
