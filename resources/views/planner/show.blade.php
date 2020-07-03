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
                    
                    
                        {{-- <input style="height:25px;width:25px" type="checkbox" name="status" value={{$plan->id}} > --}}
                    

                </tr>

        
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <a href="/daily/create" class="btn btn-primary">Edit Plan</a>
        </div>
        @else
           No Plans Yet
        @endif
</h4>




@endsection
      

