<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PoolUserAnswer;
use Validator;
use Illuminate\Http\Request;

class PoolUserAnswerController extends Controller
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
        $passUserAnswerData = $request->all();
        $validator = Validator::make($passUserAnswerData,[
            'pool_user_id'=>'required',
            'answer_id'=>'required',
            'answer'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $poolUserAnswer = PoolUserAnswer::create($passUserAnswerData);
        return response()->json(['message'=>'Success','result'=>$poolUserAnswer]);
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
        $poolUserAnswer = PoolUserAnswer::find($id);
        return response()->json(['message'=>'Success','result'=>$poolUserAnswer]);
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
        $passUserAnswerData = $request->all();
        $validator = Validator::make($passUserAnswerData,[
            'pool_user_id'=>'required',
            'answer_id'=>'required',
            'answer'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $poolUserAnswer = PoolUserAnswer::find($id);
        $poolUserAnswer->update($passUserAnswerData);
        return response()->json(['message'=>'Success','result'=>$poolUserAnswer]);

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
        $poolUserAnswer = PoolUserAnswer::find($id);
        $poolUserAnswer->delete();

        return response()->json(['message'=>'Success','result'=>$poolUserAnswer]);
    }

    public function submitAnswer(Request $request)
    {
        $poolUserAnswerData = $request->all();
        $validator = Validator::make($poolUserAnswerData,[
            'user_id'=>'required',
            'pool_id'=>'required',
            'question_id'=>'required',
            'answer_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $poolUserAnswer = PoolUserAnswer::create($poolUserAnswerData);

        return response()->json(['message'=>'Success','result'=>$poolUserAnswer]);

    }
}
