@extends('layouts.app')


@section('content')
    <div class=" text-center">
        <h1> Your Posts</h1>
   
        @if(count($posts) > 0)
            <table class="table ">
                <tr>
                    <th><h2>Title</h2></th>
                    <th><h2>Cover Image</h2></th>
                    <th></th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        
                        <td> <h5>{{$post->title}}</h5>
                            <small> {{$post->created_at}}</small>
                        </td>
                        <td>
                            <img src="/storage/cover_images/{{$post->cover_image}}" style="width:75px">
                        </td>
                        <td> 
                            
                                <a href="/posts/{{$post->id}}" class="btn btn-primary">Edit</a>
                            
                        </td>
                        <td>
                            {!! Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST', 'class' =>'float-right']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{ Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        </td>
                        
                    
                    </tr>
                @endforeach
            </table>
            <br>
        

        @else
            <p>No text found</p>
        @endif
        <a class="btn primary" style="border: 2px solid #4CAF50" href="/posts/create">Create Post</a>
    </div>


    
@endsection