<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // index
    public function index() {
        // return "This is Post Controller at index method";

        $posts = new Post;
        // all() is a laravel method that retreives all the data from a table.
        $all_posts = $posts->all();

        foreach($all_posts as $post) {
            echo "TITLE: $post->title <br>";
            echo $post->content . "<br>";
        }
    }

    //viewPost
    public function viewPost($post_id) {
        return "Post Controller: This is Post $post_id.";
    }

    //viewUserPost
    // public function viewUserPost($username, $post_id) {
    //     return "Post $post_id. This is the post of $username";
    // }

    //viewAllPosts
    public function viewAllPosts() {
        //view() - is a method that will access the resources>views file
        // return view('view-all');

        $post_titles = [
            'Python vs Java',
            'The cloud',
            'How to Stay Productive',
            'Coding during a pandemic'
        ];

        return view('view-all')->with('post_titles', $post_titles);
    }

    //viewUserPost
    public function viewUserPost($username, $post_id) {
        // with() - is a method that appends variable/s to the view file returned by the method
        $x = 0;
        $countries = ['PH', 'JP', 'US', 'AU'];
        $categories = [];
        return view('view-post')
                ->with('post_id', $post_id)
                ->with('myName', $username)
                ->with('x', $x)
                ->with('countries', $countries)
                ->with('categories', $categories);
    }

    //save
    public function save() {
        // this is to create a new instance of Post model
        $post = new Post;

        //assign  new values
        $post->title = "Laravel 10 release v2";
        $post->content = "As you know, we updated the Laravel cycle";
        // save() is a laravel method to save the data on the posts table
        $post->save();

        // return statement to display that the data is saved.
        return "The Post is Saved.";
    }
    //create
    public function create() {
        $post = new Post;

        $new_post = [
            'title' => 'How to Stay Productive',
            'content' => 'To be truly productive, you must first set your goal.'
        ];

        $post->create($new_post);
        return "The Post is Saved!";
    }

    

    // public function show($post_id) {
    //     $posts = new Post;
    //     // findOrFail() will retrieve a single record by its primary key and if it is not found it will throw an error message.
    //     //find()
    //     $post = $posts->findOrFail($post_id);

    //     echo "TITLE: $post->title <br>";
    //     echo $post->content . "<br>";
    // }

    public function showWhere($post_id) {
        $posts = new Post;
        
        // using where
        // where() is a laravel method that set the condition to query the posts table
        // get() is a laravel method that lets you get the result.
        // $post = $posts->where('id', $post_id)->get();

        // using greater than comparison operator
        // $post = $posts->where('id', '>', $post_id)->get();

        // using less than comparison operator
        $post = $posts->where('id', '<', $post_id)->get();

        // using latest()
        $post = $posts->where('id', '>', $post_id)->latest()->get();

        // TODO take()

        foreach($post as $key) {
            echo "ID: $key->id <br>";
            echo "TITLE: $key->title <br>";
            echo $key->content . "<br>";
        }
    }

    //Activity-2
    public function showPost($name){
        $posts = new Post;
        return view('show');
    }

}