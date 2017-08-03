@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="create-project-headline col-md-6 col-md-offset-5">
		<h2>Create a Project</h2>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="create-project-panel col-md-8 col-md-offset-2">
		<div class="create-project-form">
		{!! Form::open(['action'=>'ProjectController@store'], ['class'=>'form-horizontal']) !!}

				{{ Form::label('name', 'Project name:', ['class'=>'col-md-3 control-label', 'id'=>'showprojectname']) }}
				{{ Form::text('name', null, ['class'=>'createprojectname form-control']) }}

				{{ Form::label('description', 'Project description:', ['class'=>'col-md-3 control-label', 'id'=>'showprojectdescription']) }}
				{{ Form::textarea('description', null, ['class'=>'createprojectdescription form-control']) }}

				{{ Form::label('status', 'Select project status:', ['class'=> 'col-md-3 control-label', 'id'=>'showprojectstatus'])}}
				{{ Form::select('status', ['In development' => 'In development', 'In testing' => 'In testing', 'Finished testing' => 'Finished testing'], null, ['placeholder' => 'Select status', 'id'=>'createprojectselect']) }}
		{!! Form::close() !!}
		</div>
	</div>
</div> <!-- end of row -->
<div class="row">
		<div class="create-project-submit form-group">	
			<div class="col-md-6 col-md-offset-4">
				<button id="create-project-button" type="submit" class="btn btn-primary">
                    Create Project
                </button>
			</div>
		</div>
	</div>
</div> <!-- end of row -->

@endsection