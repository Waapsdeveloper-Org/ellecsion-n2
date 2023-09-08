<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator;


class RegisterController extends Controller
{
    //
    function login(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'=>'required|email',
                'password'=>'required'
            ]);

        if($validator->fails())
        {
            return response()->json('Invalid credentials');
        }

        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user = auth()->user();
            $data['token'] = $user->createToken('myApp')->accessToken;
            return response()->json(['message'=>'Success','data'=>$data]);
        }
    }

    function register(Request $request)
    {
        $userData = $request->all();

        $validator = Validator::make($userData,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|digits:8'
        ]);

        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->first()]);
        }

        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);

        return response()->json(['message'=>'success','result'=>$user]);

    }

}
