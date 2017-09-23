<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Introduction;
use App\Test;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IntroductionController extends Controller
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

        $existingintroduction = Introduction::where('test_id', $testId)
                                            ->first();

        return view('introductions.create')->with('testId', $testId)->with('existingintroduction', $existingintroduction);
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
            'introduction'=>'required'
            ));

        $introduction = new Introduction;

        $introduction->introduction = $request->introduction;
        $introduction->test_id = $request->test_id;
        $introduction->creator_id = Auth::user()->id;

        $introduction->save();

        return redirect()->route('tasks.create', ['testId'=>$introduction->test_id]);
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
        $testId = Input::get('testId', false);

        //Log::info($testId);

        $introduction = Introduction::find($id);

        $test = Test::where('id', $introduction->test_id)
                    ->first();

        $task = Task::where('test_id', $introduction->test_id)
                    ->first();



        return view('introductions.edit')->with('testId', $testId)->with('introduction', $introduction)->with('test', $test)->with('task', $task);
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
            'introduction'=>'required'
            ));

        $introduction = Introduction::find($id);

        $introduction->introduction = $request->introduction;
        $introduction->test_id = $request->test_id;
        $introduction->creator_id = Auth::user()->id;

        $introduction->save();

        //Log::info($introduction->test_id);

        return redirect()->route('introductions.edit', ['id'=>$introduction->id, 'testId'=>$introduction->test_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
