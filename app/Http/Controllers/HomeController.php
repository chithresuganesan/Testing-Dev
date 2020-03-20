<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use App\Comment;
use Storage;
use Auth;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
      return view('listing', compact('Post'));
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

    public function testText($name)
    {
      $name = 'Ragavu123';
      return $name;
    }



}
