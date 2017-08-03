@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="create-test-headline col-md-">
		<h2>Create a UX test</h2>
	</div>
</div><!-- end of row-->

@include('partials/_createtestnavbar')

<div class="createtest-triangle-selector col-md-1">
</div>
<div class="create-test-info col-md-6">
	<div class="createtest-projectheadline col-md-3 col-md-offset-5">
		<h3>Project</h3>
	</div>
	<div class="createtest-existingproject col-md-9 col-md-offset-2">
		<select>
			<option>Choose and existing project</option>
			<option>Login and signup</option>
			<option>Search</option>
		</select>
	</div>
	<div class="createtest-or col-md-3 col-md-offset-5">
		<p> OR </p>
	</div>
	<div class="createtest-createproject col-md-9 col-md-offset-2">
		{!! Form::open(['action'=>'ProjectController@store'], ['class'=>'form-horizontal']) !!}
				{{ Form::text('name', null, ['class'=>'createtest-projectcreate', 'placeholder' => 'Create a new Project'])}}
		{!! Form::close() !!}
		<button id="createtest-project-button" type="submit" class="btn btn-primary">Create
        </button>
	</div>
	<hr>
	<div class="createtest-testheadline col-md-3 col-md-offset-5">
		<h3>Test</h3>
	</div>
	<div class="createtest-namedescription col-md-9 col-md-offset-2">
		{!! Form::open(['action' => 'TestController@store'], ['class'=>'form-horizontal']) !!}
			{{Form::text('name', null, ['class'=>'createtest-testname', 'placeholder' => 'Test name']) }}
			{{Form::text('description', null, ['class'=>'createtest-testdescription', 'placeholder' => 'Test description'])}}
		{!! Form::close() !!}
	</div>
	<div class="createtest-submitbutton col-md-3 col-md-offset-3">
		<button id="create-test-button" type="submit" class="btn btn-success">Save and continue
        </button>
	</div>
</div>
</div> <!-- end of row in createtestnavbar-->


@endsection