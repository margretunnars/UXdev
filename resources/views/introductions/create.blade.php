@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_createtestnavbar')

<div class="createintro-triangle-selector col-md-1">
</div>
<div class="create-test-info col-md-6">
	<div class="createintro-headline col-md-8 col-md-offset-3">
		<h3>Introduction</h3>
	</div>
	<div class="createintro-introduction col-md-9 col-md-offset-1">
		<p>Here you can write an introduction for the test user to read prior to the test start. It is useful that this text explains the test shortly what should be expected while taking the test so the test user has a rough idea of what is coming.</p>
	</div>
	<div class="createintro col-md-10 col-md-offset-1">
	@if(count($existingintroduction) > 0)
		{!! Form::model($existingintroduction, ['action' => ['IntroductionController@update', $existingintroduction->id], 'method' => 'PUT']) !!}
			{{ Form::hidden('test_id', $testId) }}
			{{ Form::label('introduction', 'Introduction:', ['class'=>'labelintroduction col-md-3 control-label']) }}
			{{ Form::textarea('introduction', $existingintroduction->introduction, ['class'=>'inputintroduction']) }}
	</div>
	<div class="createtest-submitbutton col-md-3 col-md-offset-3">
		<button id="createintroductionbutton" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save and continue
        </button>
	</div>
</div>
</div> <!-- end of row in createtestnavbar-->
		{!! Form::close() !!}
	@else
		{!! Form::open(['action'=>'IntroductionController@store']) !!}
			{{ Form::hidden('test_id', $testId) }}
			{{ Form::label('introduction', 'Introduction:', ['class'=>'labelintroduction col-md-3 control-label']) }}
			{{ Form::textarea('introduction', null, ['class'=>'inputintroduction', 'placeholder' => 'Create a UXtest introduction']) }}
	</div>
	<div class="createtest-submitbutton col-md-3 col-md-offset-3">
		<button type="submit" id="createintroductionbutton" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save and continue</button>
	</div>
</div>
</div> <!-- end of row in createtestnavbar-->
		{!! Form::close() !!}
	@endif

@endsection