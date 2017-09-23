@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="tests-table col-md-8 col-md-offset-2">
		<h3>All tests:</h3>
		<table>
			<thead>
				<th>#</th>
				<th>Tests</th>
				<th>Tasks</th>
				<th>Questions</th>
				<th>Status</th>
				<th>Edit test</th>
				<th>Delete test</th>
			</thead>
			<tbody>
				@foreach($tests as $test)
				<tr>
					<td>{{ $test->id }}</td>
					<td>{{ $test->name }}</td>
					<td>{{ count($tasksinTest) }}</td>
					<td>{{ count($questionsinTest) }}</td>
					<td>{{ $test->status }}</td>
					<td><a href="{{route('tests.edit', ['id' => $test->id])}}" class="index-tablebuttons btn btn-warning">Edit</a></td>
					<td>
					{!! Form::open(['route' => ['tests.destroy', $test->id], 'method' => 'DELETE']) !!}

					{!! Form::submit('Delete', ['class'=>'index-tablebuttons btn btn-danger'])!!}

					{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div> <!-- end of row -->
<div class="row">
	<div class="tests-createnewproject col-md-2 col-md-offset-5">
		<a href="{{route('tests.create')}}"><button id="button-tests-createtest" class="btn btn-primary">Create a new <strong>UX test</strong></button></a>
	</div>
</div> <!-- end of row -->

@endsection