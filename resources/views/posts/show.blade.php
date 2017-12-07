@extends('layouts.app')

@section('content')
  <a href="/posts" class = 'btn btn-default'>Go back</a>
  <h3>{{$post->title}}</h3>
  <div class ="container">
    {!!$post->body!!}
    <h2>Written By {{$user->name}} By {{$post->user->name}}</h2>

    {{-- 2 curly braces {{}} won't allow the html in the body to execute, so thats whi we use  a single curly brace and 2 !! --}}
  </div>
  <hr>
  <small>Written on {{$post->created_at}}</small>
  <hr>
  <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
  {!!Form::open(['action'=> ['PostsController@destroy' , $post->id], 'method' => 'POST' , 'class'=> 'pull-right']) !!}
  {{-- id so it knows which post to delete ; btn goes on submit button--}}
      {{Form::hidden('_method' , 'DELETE')}}
      {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}
  {!!Form::close()!!}
@endsection
