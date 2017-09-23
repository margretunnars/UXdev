@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_createtestnavbar')

<div class="createtest-triangle-selector col-md-1">
</div>
<div class="create-test-info col-md-6">
	<div class="createtest-headline col-md-8 col-md-offset-4">
		<h3>Test</h3>
	</div>
	@if(count($existingtests) > 0)
		<div class="createtest-existingtest col-md-10 col-md-offset-1">
		<select id="selectExistingTest">
			<option value="">Select existing test</option>
		</select>
		</div>
		<div class="createtest-or col-md-3 col-md-offset-5">
			<p> OR </p>
		</div>
	@endif
	<div class="createtest col-md-10 col-md-offset-1">
		{!! Form::open(['action'=>'TestController@store', 'class'=>'createOrUpdateTest']) !!}

				{{ Form::label('name', 'Test name:', ['class'=>'labeltestname col-md-3 control-label']) }}
				{{ Form::text('name', null, ['class'=>'inputtestname', 'placeholder' => 'Create a name for your project']) }}

				{{ Form::label('description', 'Test description:', ['class'=>'labeltestdescription col-md-3 control-label']) }}
				{{ Form::textarea('description', null, ['class'=>'inputtestdescription', 'placeholder' => 'Create a description for your project']) }}

				{{ Form::label('status', 'Select test status:', ['class'=> 'labelteststatus col-md-4 control-label'])}}
				{{ Form::select('status', ['In development' => 'In development', 'In testing' => 'In testing', 'Finished testing' => 'Finished testing'], null, ['placeholder' => 'Select status', 'class'=>'inputteststatus']) }}
	</div>
	<div class="create-test-submit form-group">	
		<div class="col-md-6 col-md-offset-3">
			<button id="createtestbutton" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save and continue</button>
        </div>
    </div>
</div> <!-- end of row -->
{!! Form::close() !!}

@endsection

