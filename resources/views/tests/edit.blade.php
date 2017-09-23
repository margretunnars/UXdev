@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_edittestnavbar')

<div class="createtest-triangle-selector col-md-1">
</div>
<div class="create-test-info col-md-6">
	<div class="createtest-headline col-md-8 col-md-offset-4">
		<h3>Test - {{$test->name}}</h3>
	</div>
	<div class="createtest col-md-10 col-md-offset-1">
		{!! Form::model($test, ['action' => ['TestController@update', $test->id], 'method' => 'PUT']) !!}

				{{ Form::label('name', 'Test name:', ['class'=>'labeltestname col-md-3 control-label']) }}
				{{ Form::text('name', $test->name, ['class'=>'inputtestname', 'placeholder' => 'Create a name for your project']) }}

				{{ Form::label('description', 'Test description:', ['class'=>'labeltestdescription col-md-3 control-label']) }}
				{{ Form::textarea('description', $test->description, ['class'=>'inputtestdescription']) }}

				{{ Form::label('status', 'Select test status:', ['class'=> 'labelteststatus col-md-4 control-label'])}}
				{{ Form::select('status', ['In development' => 'In development', 'In testing' => 'In testing', 'Finished testing' => 'Finished testing'], $test->status) }}
	</div>
	<div class="edit-test-submit form-group">	
		<div class="col-md-6 col-md-offset-3">
			<button id="editbutton" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save test</button>
        </div>
        		{!! Form::close() !!}
        <div class="col-md-11">
        	<a href="{{route('tests.index')}}" class="gobackbutton btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Go back to Tests</a>
        	<a href="{{route('introductions.edit', ['id' => $introduction->id, 'testId' => $testId[0]]) }}" class="goforwardbutton btn btn-primary"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Go forward to Edit introduction</a>
        </div>
    </div>
</div> <!-- end of row -->

@endsection

