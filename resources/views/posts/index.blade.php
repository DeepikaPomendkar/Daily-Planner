@extends('layouts.app')


@section('content')
    <div class="text-center">
        <h1 > All Posts</h1>
    </div>
    @if(count($posts) > 0)
    <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" style="width:170px;height:150px">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                

            </li>
        @endforeach
        <br>
        {{$posts->links()}}
    </ul>
    @else
        <p>No text found</p>
    @endif



    
@endsection