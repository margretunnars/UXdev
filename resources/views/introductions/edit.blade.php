@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_edittestnavbar')

<div class="createintro-triangle-selector col-md-1">
</div>
<div class="create-test-info col-md-6">
	<div class="createintro-headline col-md-8 col-md-offset-3">
		<h3>Introduction - Test {{$test->name}}</h3>
	</div>
	<div class="createintro-introduction col-md-9 col-md-offset-1">
		<p>Here you can write an introduction for the test user to read prior to the test start. It is useful that this text explains the test shortly so the test user knows what is coming.</p>
	</div>
	<div class="createintro col-md-10 col-md-offset-1">
		{!! Form::model($introduction, ['action' => ['IntroductionController@update', $introduction->id], 'method' => 'PUT']) !!}
			{{ Form::hidden('test_id', $introduction->test_id) }}
			{{ Form::label('introduction', 'Introduction:', ['class'=>'labelintroduction col-md-3 control-label']) }}
			{{ Form::textarea('introduction', $introduction->introduction, ['class'=>'inputintroduction']) }}
	</div>
<div class="edit-test-submit form-group">	
		<div class="col-md-6 col-md-offset-3">
			<button id="editbutton" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save introduction</button>
        </div>
        	{!! Form::close() !!}
        <div class="col-md-11">
        	<a href="{{route('tests.index')}}" class="gobackbutton btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Go back to Tests</a>
        	@if($task)
        		<a href="{{route('tasks.edit', ['id' => $task->id,'testId' => $testId])}}" class="goforwardbutton btn btn-primary"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Go forward to Edit tasks</a>
        	@else
        		<a href="{{route('tasks.create', ['testId' => $testId])}}" class="goforwardbutton btn btn-primary"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Go forward to Create tasks</a>
        	@endif
        </div>
    </div>
</div>
</div> <!-- end of row in createtestnavbar-->
@endsection