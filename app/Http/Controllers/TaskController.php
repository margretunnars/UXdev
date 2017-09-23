<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Task;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
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
        $testId = Input::get('testId', false);

        $existingtasks = Task::where('test_id', $testId)
                              ->get();

        return view('tasks.create')->with('testId', $testId)->with('existingtasks', $existingtasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'=>'required',
            'instructions'=>'required',
            'start_url'=>'required',
            'end_url'=>'required',
            'max_time'=>'required',
            ));

        $task = new Task;

        $task->name = $request->name;
        $task->instructions = $request->instructions;
        $task->start_url = $request->start_url;
        $task->end_url = $request->end_url;
        $task->max_time = $request->max_time;
        $task->test_id = $request->test_id;
        $task->creator_id = Auth::user()->id;

        $task->save();

        return redirect()->route('tasks.create', ['testId'=>$task->test_id]);
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
        //get testId
        $testId = Input::get('testId', false);

        //get task - from introduction controller -->id for first task
        $task = Task::find($id);

        //get test and first question to redirect to -->id for first question
        $test = Test::where('id', $task->test_id)
                    ->first();

        $question = Question::where('test_id', $task->test_id)
                        ->first();

        //existing tasks for load up in sidebar
        $existingtasks = Task::where('test_id', $testId)
                              ->get();


        return view('tasks.edit')->with('testId', $testId)->with('task', $task)->with('existingtasks', $existingtasks)->with('test', $test)->with('question', $question);
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
        $this->validate($request, array(
            'name'=>'required',
            'instructions'=>'required',
            'start_url'=>'required',
            'end_url'=>'required',
            'max_time'=>'required',
            ));

        $task = Task::find($id);

        $task->name = $request->name;
        $task->instructions = $request->instructions;
        $task->start_url = $request->start_url;
        $task->end_url = $request->end_url;
        $task->max_time = $request->max_time;
        $task->test_id = $request->test_id;
        $task->creator_id = Auth::user()->id;

        $task->save();

        return redirect()->route('tasks.edit', ['id' => $task->id, 'testId'=>$task->test_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $testId = $request->test_id;

        Log::info('Request testId'.$request);

        $task = Task::find($id);

        $task->delete();

        return redirect()->route('tasks.create', ['testId'=>$testId]);
    }
}
