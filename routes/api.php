<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Test;
use App\Introduction;
use App\Task;
use App\Question;
use App\QuestionResponse;
use App\TaskResponse;
use Illuminate\Support\Facades\Log;

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

Route::middleware('cors')->post('test', function(Request $request){

	//change json to php object - https://stackoverflow.com/questions/21219482/posting-json-to-laravel 
	$data = (object) $request->json()->all();

	forEach($data->tasks as $task){
		$taskResponse = new TaskResponse;
		$taskResponse->test_id = $task['testId'];
		$taskResponse->task_id = $task['taskId'];
		$taskResponse->start_time = $task['startTime'];
		$taskResponse->end_time = $task['endTime'];
		$taskResponse->testuser_id = $task['userId'];

		$taskResponse->save();
	}

	forEach($data->questions as $question){
		$questionResponse = new QuestionResponse;
		$questionResponse->test_id = $question['testId'];
		$questionResponse->question_id = $question['questionId'];
		$questionResponse->testuser_id = $question['userId'];
		$questionResponse->response = $question['response'];

		$questionResponse->save();
	}

	return 1;
});

//Download data as a .csv file - https://stackoverflow.com/questions/26146719/use-laravel-to-download-table-as-csv

Route::get('/task-responses/{id}', function($id){


    $table = TaskResponse::where('test_id', $id)
    					->get();

    $filename = "taskresponses.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('id', 'test_id', 'task_id', 'testuser_id', 'start_time', 'end_time'));

    foreach($table as $row) {
        fputcsv($handle, array($row['id'], $row['test_id'], $row['task_id'], $row['testuser_id'], $row['start_time'], $row['end_time']));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    return Response::download($filename, 'taskresponses.csv', $headers);
});

Route::get('/question-responses/{id}', function($id){

	$table = QuestionResponse::where('test_id', $id)
								->get();

	$filename = "questionresponses.csv";
	$handle = fopen($filename, 'w+');
	fputcsv($handle, array('id', 'test_id', 'question_id', 'testuser_id', 'response'));

	foreach($table as $row) {
		fputcsv($handle, array($row['id'], $row['test_id'], $row['question_id'], $row['testuser_id'], $row['response']));
	}

	fclose($handle);

	$headers = array(
		'Content-Type' => 'text/csv',
	);

	return Response::download($filename, 'questionresponses.csv', $headers);

});

