<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Daily;
class PlansController extends Controller
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
        $daily = Daily::where('creation_date','=',$todaysDate)->where('user_id','=',$userId)->get();
        if(count($daily)==0){
            $plans=[];
            return view('planner.create')->with(['plans'=>$plans,'todaysDate'=>$todaysDate]);
        }
        $id = $daily[0]->id;
        $plans = Plan::where('daily_id','=',$id)->get();
        return view('planner.show')->with(['plans'=>$plans,'todaysDate'=>$todaysDate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $plan= Plan::find($id);
        $status =$request->input('status');

        if ($plan->status=="N"){
            if($status=="check"){
                $plan->status="Y";
                $plan->save();
            }
        }
        else{
            if($status==""){
                $plan->status="N";
                $plan->save();
            }
        }

        return redirect('/daily/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect('/daily/create');
    }
}
