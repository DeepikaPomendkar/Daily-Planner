<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daily;
use App\Plan;
class PlannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todaysDate = date("Y-m-d");
        
        $userId = auth()->user()->id;
        $daily = Daily::orderBy('creation_date','desc')->where('user_id','=',$userId)->get();
      
        return view('planner.index')->with(['daily'=>$daily,'todaysDate'=>$todaysDate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todaysDate = date("Y-m-d");
        $userId = auth()->user()->id;
        $daily = Daily::where('creation_date','=',$todaysDate)->where('user_id','=',$userId)->get();
        if(count($daily)==0){
            $plans=[];
            return view('planner.create')->with(['plans'=>$plans,'todaysDate'=>$todaysDate]);
        }
        $id = $daily[0]->id;
        $plans = Plan::where('daily_id','=',$id)->get();
        return view('planner.create')->with(['plans'=>$plans,'todaysDate'=>$todaysDate]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todaysDate = date("Y-m-d");
        $userId = auth()->user()->id;
        $daily = Daily::where('creation_date','=',$todaysDate)->where('user_id','=',$userId)->get();
        if(count($daily)!=0){
            $plan = new Plan;
            $plan->work = $request->input('task');
            $plan->status ="N";
            $plan->daily_id = $daily[0]->id;
            $plan->save();
        }
        else{
            $tempDaily = new Daily;
            $tempDaily->creation_date = $todaysDate;
            $tempDaily->user_id = $userId;
            $tempDaily->save();

            $plan = new Plan;
            $plan->work = $request->input('task');
            $plan->status ="N";
            $plan->daily_id = $tempDaily->id;
            $plan->save();
        }


        return redirect('/daily/create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
