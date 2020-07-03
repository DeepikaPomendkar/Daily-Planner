@extends('layouts.app')
@section('content')
    <h1> This is your planner <a href="/daily/create" class="btn btn-primary">Create A Plan</a></h1>
  

        @if(count($daily) > 0)
  


            <div class="row">
                @foreach ($daily as $item)
                <div class="col-md-4">
                    <div class="card" >
                        <div class="card-body">
                        <h4 class="card-title">{{$item->creation_date}}</h4>
                        @if($item->creation_date==$todaysDate)
                        <a href="/daily/create" class="btn btn-danger">Edit</a>
                        @endif
                        <a href="/plan" class="btn btn-primary">See Plan</a>
                        </div>
                    
                    </div>
                </div>
                @endforeach
                
            </div>
        @else
            No Plans Yet
        @endif


@endsection