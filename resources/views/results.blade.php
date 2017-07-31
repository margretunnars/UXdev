@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="results-selectproject col-md-1 col-md-offset-2">
		<select>
			<option>Select Project</option>
			<option>Login and signup</option>
			<option>Search</option>
		</select>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="results-table col-md-8 col-md-offset-2">
		<table>
			<thead>
				<th>Test name</th>
				<th>No. of tasks</th>
				<th>Avg. time</th>
				<th>No. of test users</th>
				<th>Download</th>
			</thead>
			<tbody>
				<tr>
					<td>Test Login</td>
					<td>2</td>
					<td>#</td>
					<td>5</td>
					<td><button id="results-download-button">Download</button></td>
				</tr>
				<tr>
					<td>Test Signup</td>
					<td>3</td>
					<td>#</td>
					<td>5</td>
					<td><button id="results-download-button">Download</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</div> <!-- end of row -->
	<hr> <!-- from here to be iterated for all tasks-->
<div class="row">
	<div class="results-table-heading col-md-2 col-md-offset-2">
		<h3>Test Login</h3>
	</div>
</div> <!-- end of row-->
<div class="row">
	<div class="results-table-tasks col-md-8 col-md-offset-2">
		<table>
			<thead>
				<th>#</th>
				<th>Task name</th>
				<th>Avg. time elapsed in sec</th>
				<th>Avg. no. of clicks</th>
				<th>Completed</th>
				<th>More info</th>
			</thead>
			<tbody>
				<tr>
					<td>Task 1</td>
					<td>Find Login</td>
					<td>50</td>
					<td>3</td>
					<td>100%</td>
					<td><a href="#">Click here</a></td>
				</tr>
				<tr>
					<td>Task 2</td>
					<td>Submit Login</td>
					<td>100</td>
					<td>6</td>
					<td>100%</td>
					<td><a href="#">Click here</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div> <!-- end of row-->

@endsection