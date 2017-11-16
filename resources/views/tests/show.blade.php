@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_createtestnavbar')

	<div class="testcompleted-triangleselector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
		<div class="testcompleted col-md-8 col-md-offset-3">
			<h3>Test Completed!!</h3>
		</div>
		<div class="createtest-submitbutton-testcompleted col-md-12">
			<a href="{{route('tests.index')}}" id="createquestionbutton-continue" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Go to Tests </a>
			<a href="{{url('home')}}" id="createquestionbutton-continue" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Go to Dashboard </a>
		</div>
	</div>

@endsection