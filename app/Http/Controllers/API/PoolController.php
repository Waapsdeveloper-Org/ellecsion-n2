<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pool;
use Validator;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pools = Pool::all();
        return response()->json(['message'=>'success','result'=>$pools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poolData = $request->all();
        //
        $validator = Validator::make($poolData,[
            'title'=>'required',
            'description'=>'required',
            'user_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $pool = Pool::create($poolData);

        return response()->json(['message'=>'Success','result'=>$pool]);
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
        $pool = Pool::find($id);
        return response()->json(['message'=>'Success','result'=>$pool]);
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
        //
        $poolData = $request->all();
        //
        $validator = Validator::make($poolData,[
            'title'=>'required',
            'description'=>'required',
            'user_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $pool = Pool::where('id',$id)->first();
        $pool->title = $request->title;
        $pool->description = $request->description;
        $pool->user_id = $request->user_id;
        $pool->save();

        return response()->json(['message'=>'Success','pool'=>$pool]);
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
        $pool = Pool::find($id);
        $pool->delete();

        return response()->json(['message'=>'Pool deleted successfully','result'=>$pool]);
    }
}
