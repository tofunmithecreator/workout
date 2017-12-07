@extends('layouts.app')

@section('content')
  <h1>Create post</h1>
  {{--the next line is added afterb using  in the bash uli '$ composer require "laravelcollective/html":"^5.3.8" ' for creating forms, we then updated the config.app file; adding to the alliases and providers  --}}
  {!! Form::open(['action' => 'PostsController@store','method'=>'POST']) !!}
  {{-- // 'store' is the function we are submitting to  --}}
      <div class="form-group">
        {{Form::label('title' , 'Title')}}
        {{-- //  label for title and the actual text which is title --}}
        {{Form::text('title', '', ['class'=> 'form-control', 'placeholder' => 'Title'])}}
        {{-- // for text input, with name  'title'; the second parameter the value and is empty an string since its a create form ; attributes are then added into the array --}}
      
        {{Form::label('body' , 'Body')}}
        {{-- //  label for body and the actual text which is the Body--}}
        {{Form::textarea('body', '', ['id' =>'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Body Text'])}}
        {{Form::submit('Create' , ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}

        {!!Form::open(['action'=> ['DashboardController@index'], 'method' => 'GET' , 'class'=> 'pull-right']) !!}
        {{-- id so it knows which post to delete ; btn goes on submit button--}}
            {{-- {{Form::hidden('_method' , 'DELETE')}} --}}
        {{Form::submit('Back' , ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>
@endsection
