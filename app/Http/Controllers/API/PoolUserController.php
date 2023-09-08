<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PoolUser;
use Validator;
use Illuminate\Http\Request;

class PoolUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $poolUserData = $request->all();
        $validator = Validator::make($poolUserData,[
            'pool_id'=>'required',
            'user_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $poolUser = PoolUser::create($poolUserData);
        return response()->json(['message'=>'Success','result'=>$poolUser]);
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
        $poolUser = PoolUser::find($id);
        return response()->json(['message'=>'Success','result'=>$poolUser]);
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
        $poolUserData = $request->all();

        $validator = Validator::make($poolUserData,[
            'pool_id'=>'required',
            'user_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $poolUser = PoolUser::find($id);
        $poolUser->update($poolUserData);

        return response()->json(['message'=>'Success','result'=>$poolUser]);
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
        $poolUser = PoolUser::find($id);
        $poolUser->delete();
        return response()->json(['message'=>'Success','result'=>$poolUser]);
    }
}
