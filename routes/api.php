<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\PoolController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\PoolUserController;
use App\Http\Controllers\API\PoolUserAnswerController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[RegisterController::class,'login']);
Route::post('register',[RegisterController::class,'register']);
//Route::middleware('checkLogin')->group(function()
//{
//    Route::get('test',function (){
//        echo "good";
//    });
    Route::middleware(['auth:api'])->group(function() {


//        Route::get('test',=);

        Route::resource("pool",PoolController::class);
        Route::resource("question",QuestionController::class);
        Route::get("questions-of-pool/{id}",[QuestionController::class,'questionsOfPool']);

        Route::resource("answer",AnswerController::class);
        Route::get("answers-of-question/{id}",[AnswerController::class,'answersOfQuestion']);

        Route::resource('pool-user',PoolUserController::class);
        Route::resource('pool-user-answer',PoolUserAnswerController::class);

        Route::post('submit-answer',[PoolUserAnswerController::class,'submitAnswer']);
        Route::get('user',[UserController::class,'getUser']);
    });
//});

