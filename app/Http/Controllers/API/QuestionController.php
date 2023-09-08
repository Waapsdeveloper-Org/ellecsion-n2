<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Validator;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        $questionData = $request->all();

        $validator = Validator::make($questionData,[
           'title'=>'required',
           'description'=>'required',
           'pool_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $question = Question::create($questionData);

        return response()->json(['message'=>'Question added successfully','result'=>$question]);
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
        $question = Question::find($id);
        return response()->json(['message'=>'success','result'=>$question]);
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
        $questionData = $request->all();
        $validator = Validator::make($questionData,[
            'title'=>'required',
            'description'=>'required',
            'pool_id'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first]);
        }

        $question = Question::find($id);
        $question->update($questionData);

        return response()->json(['message'=>'Question updated successfully','result'=>$question]);
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
        $question = Question::find($id);
        $question->delete();

        return response()->json(['message'=>'Success','result'=>$question]);
    }

    public function questionsOfPool($id)
    {
        $questions = Question::where('pool_id',$id)->get();
        return response()->json(['message'=>'success','result'=>$questions]);
    }
}
