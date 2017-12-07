
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4><a href="/posts/create" >Create Post</a></h4>
                        <hr>
                        <h4><a href="/posts">View BlogPosts</a></h4>

                    {{-- @if (count($posts) > 0)
                        <table class = "table table-striped">
                          <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                          </tr>
                          @foreach ($posts as $post)
                            <tr>
                              <td>{{$post->title}}</td>
                              <td><a href="#" class = "btn btn-primary">Edit</a></td>
                            </tr>
                          @endforeach
                        </table
                          @else {{'No posts yet!'}}
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
