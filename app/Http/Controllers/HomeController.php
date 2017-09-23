<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Test;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recenttests = Test::where('creator_id', Auth::user()->id)
                            ->get();
        $testsindev = Test::where('creator_id', Auth::user()->id)
                            ->where('status', 'In development')
                            ->get();

        $testsintesting = Test::where('creator_id', Auth::user()->id)
                            ->where('status', 'In testing')
                            ->get();

        $testsfinished = Test::where('creator_id', Auth::user()->id)
                            ->where('status', 'Finished testing')
                            ->get();

        return view('home')->with('recenttests', $recenttests)->with('testsindev', $testsindev)->with('testsintesting', $testsintesting)->with('testsfinished', $testsfinished);
    }

    public function projects()
    {
        return view('projects');

    }

    public function results()
    {
        return view('results');
    }

    public function account()
    {
        return view('account/details');
    }
}
