<?php
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   $Post = Post::all();
//     return view('welcome', compact('Post'));
// });

Auth::routes();

// Open Home Page
Route::get('/', 'Post\PostController@index')->name('index');

// Open Home Page
Route::get('open/dashboard', 'Post\PostAuthController@openDashboard')->name('dashboard');

// Opens Details Page
Route::get('/details/page/{id}', 'Post\PostController@openDetailsPage')->name('detailsPage');

// Route to store post data function
Route::post('/store/data', 'Post\PostAuthController@storeData')->name('storeData');

// Route to open Listing Page function
Route::get('/listing/page', 'Post\PostAuthController@openListingPage')->name('listingPage');

// Route to Update post data function
Route::post('/update/post/{id}', 'Post\PostAuthController@updatePost');

// Route to Store Comments function
Route::post('/store/comment', 'Post\PostAuthController@storeComment')->name('storeComments');

Route::get('/view-image/{post}', 'HomeController@image')->name('image');

Route::get('post/{post}/like', 'LikeController@index')->name('likeStore');

Route::get('test/page', 'MainController@viewTestPage')->name('test');

// Route::get('user/{name}', 'HomeController@testText')
// ->where('name', '[A-Za-z]+')->name(testing);

// Route::post('ajaxRequest', 'HomeController@ajaxRequest')->name('ajaxRequest');

 // Route::resource('like', 'LikeController');
