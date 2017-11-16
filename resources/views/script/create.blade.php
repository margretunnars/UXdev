@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_createtestnavbar')

	<div class="createjavascript-triangleselector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
		<div class="createquestion-headline col-md-8 col-md-offset-3">
			<h3>Javascript tag</h3>
		</div>
		<div class="createjavascript col-md-10 col-md-offset-1">
			<h3> Please include the following HTML tags into the HTML of all webpages that are part of the UX test </h3>
			<h3>&lt;script&gt; src="client.js" &lt;script&gt;</h3>
			<h3>&lt;div&gt; id="uxdev-container" &lt;div&gt;</h3>
		</div>
		<div class="createtest-submitbutton col-md-6 col-md-offset-3">
			<a href="{{route('tests.show', ['id' => $test->id, 'testId'=>$testId])}}" id="createquestionbutton-continue" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm and go to Test Completed </a>
		</div>
	</div>

@endsection