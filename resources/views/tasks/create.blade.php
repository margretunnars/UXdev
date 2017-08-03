@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

<div class="row">
	<div class="create-test-headline col-md-">
		<h2>Create a UX test</h2>
	</div>
</div><!-- end of row-->

@include('partials/_createtestnavbar')

	<div class="createtest-triangle-selector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
	</div>
</div> <!-- end of row in createtestnavbar-->


@endsection