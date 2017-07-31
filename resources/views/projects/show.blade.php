@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="show-project-headline col-md-12">
		<h2>Project - {{$project->name}}</h2>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="show-project-panel col-md-4 col-md-offset-3">
		<div class="show-project1">
			<p id="showprojectname">Project name:</p>
				<p>{{$project->name}}</p>
			<p id="showprojectdescription">Project description:</p>
				<p>{{$project->description}}</p>
			<p id="showprojectstatus">Status:</p>
				<p>{{$project->status}}</p>
			<p id="showprojecttests">Tests in this project:</p>
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
			<a href="{{route('projects.edit', $project)}}"<button id="edit-project-button" type="submit" class="btn btn-success">Edit Project</button></a>
	        <a href="{{route('projects.delete', $project)}}"<button id="delete-project-button" type="submit" class="btn btn-danger">Delete Project
	        </button></a>
		</div>
	</div>
</div><!-- end of row-->
<div class="row">
	<div class="show-project-newtest col-md-3 col-md-offset-5">
		<button id="newtest-button" type="submit" class="btn btn-primary">Create a test for this project
        </button>
	</div>
</div><!-- end of row-->


@endsection