<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Test;
use App\Introduction;
use App\Task;
use App\Question;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->get('test/{id}', function($id){

	//get test with correct ID
	$test = Test::find($id);

	$introduction = Introduction::where('test_id',$id)
								->first();

	$tasks = Task::where('test_id', $id)
					->get();

	$questions = Question::where('test_id', $id)
							->get();

	//format array of all information for correct test
	$formatted = array('test' => $test, 'introduction' => $introduction, 'tasks' => $tasks, 'questions' => $questions);

	//return json object of correct test
	return json_encode($formatted, true);
});

