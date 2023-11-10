<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return "Hello World!";
});

// this route will display a string that has a single parameter passed through its URI
Route::get('/user/{id}', function($id) {
    return "This is the User $id";
});

// this route will display a string that has two parameter passed through its URI
Route::get('/{username}/post/{post_id}', function($username, $post_id) {
    return "Post $post_id. This is the post of $username";
});

// Route Naming
Route::get('/dashboard/admin', function() {
    return "Welcome Admin!";
})->name('adm');

Route::get('/dashboard/subscriber', function() {
    return "Welcome Subscriber!";
})->name('sub');

// this reoute will redirect the user to the URI=/dashboard/admin
Route::get('/login', function() {
    return redirect()->route('adm');
});

// this route connects to index() at Postcontroller
Route::get('/post', [PostController::class, 'index']);

// Pass a parameter to URI and connect it to Postcontroller at viewPost()
Route::get('/post/{post_id}', [PostController::class, 'viewPost']);

// Pass two parameter to URI and connect it to Postcontroller at viewUserPost()
// Route::get('/post/{username}/{post_id}', [PostController::class, 'viewUserPost']);

// this route will access the Postcontroller at method viewAllPosts
Route::get('/view-all', [PostController::class, 'viewAllPosts']);

// this route will access the Postcontroller at method viewUserPost()
Route::get('view-post/{username}/{post_id}', [PostController::class, 'viewUserPost']);

// this route will store a data to the posts talbe
Route::get('/store/save',[PostController::class, 'save']);

// this route will store batch of data to the posts table
Route::get('/store/create', [PostController::class, 'create']);

// this route will read all the data from the posts table
Route::get('/read-all', [PostController::class, 'index']);

// this route will get a single ditail insdie the posts table
Route::get('/read/{post_id}',[PostController::class, 'show']);

// this route will get a single detail inside the posts table using conditions
Route::get('/read-where/{post_id}', [PostController::class, 'showWhere']);

// Activity2 - this route will get a 
Route::get('/show/{name}', [PostController::class, 'showPost']);