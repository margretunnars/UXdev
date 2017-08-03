@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="show-project-headline col-md-12">
		<h2>{{$project->name}}</h2>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="edit-project-panel col-md-4 col-md-offset-3">
		{!! Form::model($project, ['route'=> ['projects.update', $project->id], 'method'=>'PUT']) !!}

		<div class="show-project1">
			{{ Form::label('name', 'Project name:', ['class'=>'control-label', 'id'=>'showprojectname']) }}
			{{ Form::text('name', null, ['class'=>'form-control', 'id'=>'editprojectname']) }}

			{{ Form::label('description', 'Project description:', ['class'=>'control-label', 'id'=>'showprojectdescription']) }}
			{{ Form::textarea('description', null, ['class'=>'form-control', 'id'=>'editprojectdescription']) }}

			{{ Form::label('status', 'Select status:', ['class'=> 'control-label', 'id'=>'showprojectstatus'])}}
			{{ Form::select('status', ['In development' => 'In development', 'In testing' => 'In testing', 'Finished testing' => 'Finished testing'], null, ['placeholder' => 'Select status', 'id'=>'editselect']) }}
		</div>
	</div>
	<div class="stats-buttons col-md-2">
		<div class="show-project-stats">
			<p id="showprojectcreator"><strong>Project creator:</strong> {{$project->creator_id}}</p>
			<hr>
			<p id="showprojectdatecreated"><strong>Created at:</strong></p>
			<p id="showprojectdateupdated"><strong>Updated at:</strong></p>
		</div>
		<div class="show-projects-buttons">
			<a href="{{route('projects.show', $project)}}"><button id="edit-project-button" class="btn btn-danger">Cancel changes</button></a>

			{!! Form::submit('Save changes', ['class' => 'btn btn-success', 'id'=>'delete-project-button']) !!}
		</div>
	</div>
</div><!-- end of row-->


@endsection
