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
				<tr>
					<td>Login and signup</td>
					<td><a href="#">2</a></td>
					<td>10</td>
					<td> 
						<select>
							<option>Select status</option>
							<option>In development</option>
							<option>In testing</option>
							<option>Finished testing</option>
						</select>
					</td>
					<td>
						<form action="">
							<input id="comment" type="text">
							<input id="comment-submit" type="submit">
						</form>
					</td>
				</tr>
				<tr>
					<td>Search</td>
					<td><a href="#">1</a></td>
					<td>5</td>
					<td>
						<select>
							<option>Select status</option>
							<option>In development</option>
							<option>To be tested</option>
							<option>In testing</option>
							<option>Finished testing</option>
						</select>
					</td>
					<td>
						<form action="">
							<input id="comment" type="text">
							<input id="comment-submit" type="submit">
						</form>
					</td>
			</tbody>
		</table>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="tests-createnewproject col-md-2 col-md-offset-3">
		<button id="button-tests-createproject"><a href="{{route('projects.create')}}">Create a new </a><strong>Project</strong>
		</button>
	</div>
	<div class="tests-createnewtest col-md-3">
		<button id="button-tests-createtest">Create a new <strong>UX test</strong>
		</button>
	</div>
</div> <!-- end of row -->

@endsection