@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="results-selectproject col-md-6 col-md-offset-4">
		<h1>Results of tests made by {{Auth::user()->name}}</h1>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="results-table col-md-8 col-md-offset-2">
		<table>
			<thead>
				<th>Test name</th>
				<th>No. of tasks</th>
				<th>No. of questions</th>
				<th>No. of test users</th>
				<th>Download task results</th>
				<th>Download question results</th>
			</thead>
			<tbody>
			@foreach($tests as $test)
				<tr>
					<td>{{$test->name}}</td>
					<td>6</td>
					<td>3</td>
					<td>5</td>
                    <td><a href="/api/task-responses/{{$test->id}}" class="home-tablebutton btn btn-primary">Download</a></td>
                    <td><a href="/api/question-responses/{{$test->id}}" class="home-tablebutton btn btn-primary">Download</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div> <!-- end of row -->

@endsection