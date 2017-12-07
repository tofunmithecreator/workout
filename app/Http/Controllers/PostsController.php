<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

//use DB; in cases where we want to use raw sql queries

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all(); //this makes $post a variable containing all the posts.
        //$posts = Post::orderBy('title' , 'asc')->get(); // the orderBy function takes 2 parameters; the sorting parameter and the order(asc/desc)... it also requires the get() function to work.
        //$post = Post::where('title' , 'Post Two')->get()... this line returns only one post(Post two)
        // $post = DB::('SELECT * FROM posts');"
        //$posts = Post::orderBy('title' , 'desc')->take(1)->get();//this  helps to limiit our posts, i.e the number in the take fuction is the amoutn of things its goint to showw, so this take(1) returns only post 2 as there are only 2 posts in the the application rn; the  note that oyu go over this funtion witht the index oage also.
        $posts = Post::orderBy('created_at' , 'desc')->paginate(5);// helps to break pages; paginate(1) means that it woulonlt diplay i row per page; the pagination links are kept in thefolder of the function; hence this one is in the index file with the "{{$posts->links()}}". we increased the pagination to 10 posts.so, pagination starts after the 10th post
        return view('posts.index')->with('posts' , $posts); // the 'post variable is passed in2 the index view'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation in laravel is easy, after writinh the 'this and validate function' you'd put an rray of rules as one of its pg_parameter_status
        $this->validate($request,[
          'title' => 'required',// allows non submission of empty title or body
          'body' => 'required'
        ]);

        //we'd be importing the  Post from the 'use\App'
        $post = new Post;
        $post->title = $request->input('title'); //theses are fields;as title is set  to request, and the '$request=>input('title')' gets whatever is inputed into the form on title.
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id; //this gets the currently logged on user
        $post->save();

        return redirect('/posts')->with('success' , 'Post Created'); // this redirecting to the posts homepage with  the message in 'with'(a success maessage). this is where we actually set the messages that were vcreated in the meassages file.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // view('posts.show')->with('post' , $post);
        return view('posts.show')->with('post' , $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      return view('posts.edit')->with('post' , $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'title' => 'required',
          'body' => 'required'
        ]);


        $post = Post::find($id); // we are finding a post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success' , 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success' , 'Post Removed');
    }
}
