<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Task;
use App\Question;
use App\Introduction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all tests made by a current user
        $tests = Test::where('creator_id', Auth::user()->id)
                            ->get();

        //get all tasks for each test made by a current user
        $testIds = [];

        foreach ($tests as $test) {
            array_push($testIds, $test->id);
        }

        $tasksinTest = Task::whereIn('test_id', $testIds)
                                  ->get();

        //get all questions for each test made by a current user
        $questionIds = [];

        foreach($tests as $test){
            array_push($questionIds, $test->id);
        }

        $questionsinTest = Question::whereIn('test_id', $questionIds)
                                        ->get();


        return view('tests.index')->with('tests', $tests)->with('tasksinTest', $tasksinTest)->with('questionsinTest', $questionsinTest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $existingtests = Test::where('creator_id', Auth::user()->id)
                                    ->pluck('name', 'id'); /* https://laracasts.com/discuss/channels/laravel/lists-deprecated-replacement?page=1
                                    http://laravel-tricks.com/tricks/easy-dropdowns-with-eloquents-lists-method
                                    */                         

        return view('tests.create')->with('existingtests', $existingtests);
    }

    public function testsJson(){
        $existingtests = Test::where('creator_id', Auth::user()->id)
                                     ->get();

        return response()->json($existingtests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request->getContent());

        //validate the data
        $this->validate($request, array(
            'name'=>'required',
            'description'=>'required',
            'status'=>'required',
            ));

        //store the data in database

        $test = new Test;

        $test->name = $request->name;
        $test->description = $request->description;
        $test->status = $request->status;
        $test->creator_id = Auth::user()->id;

        $test->save();

        //redirect to another page

        return redirect()->route('introductions.create', ['testId'=>$test->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);

        return view('tests.show')->with('test', $test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);

        $testId = Test::where('id', $test->id)
                        ->pluck('id');

        $introduction = Introduction::where('test_id', $test->id)
                                            ->first();

        return view('tests.edit')->with('test', $test)->with('testId', $testId)->with('introduction', $introduction);
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
        //validate the data
        $this->validate($request, array(
            'name'=>'required',
            'description'=>'required',
            'status'=>'required',
            ));

        //store the data in database
        $test = Test::find($id);

        $test->name = $request->name;
        $test->description = $request->description;
        $test->status = $request->status;
        $test->creator_id = Auth::user()->id;

        $test->save();

        //redirect to another page

        return redirect()->route('tests.edit', ['testId'=>$test->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('Delete test: '.$id);

        $test = Test::find($id);

        $test->delete();

        return redirect()->route('tests.index');
    }
}
