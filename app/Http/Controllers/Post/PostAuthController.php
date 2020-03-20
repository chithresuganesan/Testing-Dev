<?php

namespace App\Http\Controllers\Post;

use Auth;
use App\Post;
use App\User;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostAuthController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function openDashboard()
  {
    return view('post.dashboard');
  }

  public function storeData(Request $request){
    if($request->iamge != "")
         {
          $p_image = $request->iamge->store('images');
          $url = str_after($p_image, '/');
         }
         else{
          $url = "";
         }

      $data = $request->all();
      $data['created_by'] = Auth::User()->id;
      $data['iamge'] = $request->iamge->getClientOriginalName();
      $data['url'] = $url;

      $keyword = Post::create($data);
      return redirect()->back();
  }

  public function openListingPage(){
    $Post = Post::get();
    return view('post.listing', compact('Post'));
  }

  public function updatePost(Request $request, $id){
    if($request->iamge != "")
         {

          $p_image = $request->iamge->store('images');
          $url = str_after($p_image, '/');
         }
         else{
          $url = "";
         }

    $Post= \App\Post::find($id);

    $Post->title = $request->get('title');
    $Post->description = $request->get('description');
    $Post->iamge = $request->iamge->getClientOriginalName();
    $Post->url = $url;

    $Post->save();
    return redirect()->back();

  }

  public function storeComment(Request $request){

      Comment::Create([
        'comment' => $request['comment'],
        'post_id' => $request['post_id'],
        'author_id' => $request['author_id'],
        'user_id' => Auth::User()->id,
      ]);

      return back();
  }

  public function image(Post $post)
  {
    // return $post->iamge;
  return Storage::url('images/'.$post->iamge);
  }
}
