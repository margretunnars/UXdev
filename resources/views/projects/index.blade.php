@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="tests-table col-md-8 col-md-offset-2">
		<h3>All projects:</h3>
		<table>
			<thead>
				<th>Project</th>
				<th>Tests</th>
				<th>Test users</th>
				<th>Status</th>
				<th>Comment</th>
			</thead>
			<tbody>
				@foreach($projects as $project)
				<tr>
					<td>{{$project->name}}</td>
					<td>{{$project->description}}</td>
					<td></td>
					<td>{{$project->status}}</td>
					<td>
						<form action="">
							<input id="comment" type="text">
							<input id="comment-submit" type="submit">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="tests-createnewproject col-md-2 col-md-offset-3">
		<a href="{{route('projects.create')}}"><button id="button-tests-createproject">Create a new <strong>Project</strong></button></a>
	</div>
	<div class="tests-createnewtest col-md-3">
		<a href="{{route('tests.create')}}"><button id="button-tests-createtest">Create a new <strong>UX test</strong>
		</button></a>
	</div>
</div> <!-- end of row -->

@endsection