@extends('layouts.app')
@section('content')

    <br>
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <br>
    <ul>
        <br>
        <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%">
        <br>
        <br>
        <li class="list-group-item">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        </li>
        <li class="list-group-item">
            {{$post->body}}
        </li>
    </ul>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
            <a href='/posts/{{$post->id}}/edit' class="btn btn-success">Edit Post</a>
            {!! Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST', 'class' =>'float-right']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{ Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
           @endif
    @endif

@endsection