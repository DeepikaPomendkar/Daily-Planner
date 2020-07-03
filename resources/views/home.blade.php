@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                @if(count($posts) > 0)
                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item">
                                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                <small>Written on {{$post->created_at}}</small>
                            </li>
                        @endforeach
                        <br>
                        {{$posts->links()}}
                    </ul>
                @else
                    <p>No text found</p>
                @endif
                
                <a href="posts/create" class="btn btn-primary">Create New Post!!</a>
                
            </div>
        </div>
    </div>
</div>
@endsection
