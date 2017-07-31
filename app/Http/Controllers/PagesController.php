<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){

    	return view('pages.welcome');
    }

    public function getAbout(){

    	return view('pages.about');
    }

    public function getHowItWorks(){

    	return view('pages.howitworks');
    }

    public function getForDevelopers(){

    	return view('pages.fordevelopers');
    }

    public function getForTestUsers(){

    	return view('pages.fortestusers');
    }
}
