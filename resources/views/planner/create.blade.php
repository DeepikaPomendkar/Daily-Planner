@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1> Create Plan</h1>
    <h3>Todays Date: {{$todaysDate}}</h3>
</div>
<a href="/daily" class="btn btn-primary">Go Back</a>
<br>
<h4>
    <br>
        @if(count($plans) > 0)
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
               <th></th>
               <th></th>
               <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($plans as $plan)
                <tr>
                    <td>
                        {{$plan->work}}
                    </td>
                   
                    <td>
                        {{$plan->status}}
                    </td>
                    <td>
                        {!! Form::open(['action' => ['PlansController@update',$plan->id], 'method' => 'POST']) !!}
                            <div class="form-group">
                                @if($plan->status=="N")
                                
                                    {{Form::checkbox('status','check',false,["style"=>"height:25px;width:25px"])}}
                                @else
                                    {{Form::checkbox('status','check1',true,["style"=>"height:25px;width:25px"])}}
                                @endif
                            </div>
                    </td>
                    <td>
                        {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Change',['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['action'=>['PlansController@destroy', $plan->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{ Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                        {{-- <input style="height:25px;width:25px" type="checkbox" name="status" value={{$plan->id}} > --}}
                    

                </tr>

        
            @endforeach
            </tbody>
        </table>
        @else
           No Plans Yet
        @endif
</h4>



{!! Form::open(['action' => 'PlannerController@store', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{-- {{Form::label('task','Add New Task')}} --}}
                {{Form::text('task','',['class'=> 'form-control','placeholder'=>'New Task'])}}
            </div>
            
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection
      

