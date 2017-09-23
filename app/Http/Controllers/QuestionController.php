<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Test;
use App\Task;

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
        $testId = Input::get('testId', false);

        $existingquestions = Question::where('test_id', $testId)
                                      ->get();

        return view('questions.create')->with('testId', $testId)->with('existingquestions', $existingquestions);
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
            'question'=>'required',
            'likert_scale'=>'required'    
            ));

        $question = new Question;

        $question->question = $request->question;
        $question->likert_scale = $request->likert_scale;
        $question->test_id = $request->test_id;
        $question->creator_id = Auth::user()->id;

        $question->save();

        return redirect()->route('questions.create', ['testId'=>$question->test_id]);
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

        //get question - from task controller -->id for first task
        $question = Question::find($id);

        //get test
        $test = Test::where('id', $question->test_id)
                    ->first();

        //existing tasks for load up in sidebar
        $existingquestions = Question::where('test_id', $testId)
                              ->get();


        return view('questions.edit')->with('testId', $testId)->with('question', $question)->with('existingquestions', $existingquestions)->with('test', $test);
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
            'question'=>'required',
            'likert_scale'=>'required'    
            ));

        $question = Question::find($id);

        $question->question = $request->question;
        $question->likert_scale = $request->likert_scale;
        $question->test_id = $request->test_id;
        $question->creator_id = Auth::user()->id;

        $question->save();

        return redirect()->route('questions.edit', ['id', $question->id, 'testId'=>$question->test_id]);
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

        $question = Question::find($id);

        $question->delete();

        return redirect()->route('questions.create', ['testId'=>$testId]);
    }
}
