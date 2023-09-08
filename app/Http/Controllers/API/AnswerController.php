<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Validator;
use Illuminate\Http\Request;

class AnswerController extends Controller
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
        $answerData = $request->all();

        $validator = Validator::make($answerData,[
            'title'=>'required',
            'description'=>'required',
            'question_id'=>'required',
            'correct_answer'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $answer = Answer::create($answerData);
        return response()->json(['message'=>'Success','result'=>$answer]);

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
        $answer = Answer::find($id);
        return response()->json(['message'=>'Success','result'=>$answer]);
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
        $answerData = $request->all();

        $validator = Validator::make($answerData,[
            'title'=>'required',
            'description'=>'required',
            'question_id'=>'required',
            'correct_answer'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $answer = Answer::find($id);
        $answer->update($answerData);

        return response()->json(['message'=>'Success','result'=>$answer]);
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
        $answer = Answer::find($id);
        $answer->delete();

        return response()->json(['message'=>'Success','result'=>$answer]);
    }

    public function answersOfQuestion($id)
    {
        $answers = Answer::where('question_id',$id)->get();
        return response()->json(['message'=>'success','result'=>$answers]);
    }
}
