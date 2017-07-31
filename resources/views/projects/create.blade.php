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
			<form class="form-horizontal" role="form" method="POST" action="/projects" accept-charset="UTF-8">
				{{ csrf_field() }}
				<div class="create-project-name form-group">
					<label for="name" class="col-md-3 control-label">Project name</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="name">
						</div> 
				</div>
				<div class="create-project-description form-group">
					<label for="description" class="col-md-3 control-label">Project description</label>
						<div class="col-md-7">
							<input id="project-description" type="textarea" class="form-control" name="description">
						</div>
				</div>
				<div class="create-project-status form-group">
					<label for="status" class="col-md-3 control-label">Select project status</label>
						<div class="create-project-select col-md-7">
							<select name="status">
								<option value="In development">In development</option>
								<option value="In testing">In testing</option>
								<option value="Finished testing">Finished testing</option>
							</select>
						</div>
				</div>
				<div class="create-project-submit form-group">	
					<div class="col-md-6 col-md-offset-4">
						<button id="create-project-button" type="submit" class="btn btn-primary">
                        Create Project
                        </button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> <!-- end of row -->

@endsection