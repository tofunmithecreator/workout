@extends('layouts.app')

@section('content')
  <h1>Post</h1>
  {!! Form::open(['action' => ['PostsController@update' , $post->id],'method'=>'POST']) !!}
 {{-- we wanna iclude the id so, we make postscontroller and id in an array and send ou rrequest to the update route; from route list, we are makking a put/ patch request as we can't make a post request. and we can,t changeour form to 'put' asit can only take 'post'
 so, laravel allows us to spoof ou 'put request hat is kept in the hidden input down. '--}}
      <div class="form-group">
        {{Form::label('title' , 'Title')}}
        {{-- we also needto add the values --}}
        {{-- {{Form::text('title', '', ['class'=> 'form-control', 'placeholder' => 'Title'])}} --}}
        {{-- {{Form::text('title', $post->title, ['class'=> 'form-control', 'placeholder' => 'Title'])}} --}}
        {{Form::text('body', $post->title, ['id' =>'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Title'])}}
      </div>
      <div class="form-group">
        {{Form::label('body' , 'Body')}}
        {{Form::textarea('body', $post->body, ['id' =>'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Body Text'])}}
      </div>
         {{-- here, we put in the type of request we want to make:the 'put' request --}}
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection
