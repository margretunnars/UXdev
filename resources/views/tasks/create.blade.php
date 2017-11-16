@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_createtestnavbar')

	<div class="createtask-triangle-selector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
		<div class="createtask-headline col-md-8 col-md-offset-4">
			<h3>Tasks</h3>
		</div>
		<div class="createtask col-md-10 col-md-offset-1">
		{!! Form::open(['action' => 'TaskController@store']) !!}

				{{ Form::hidden('test_id', $testId) }}
				{{ Form::label('name', 'Task name:', ['class' => 'labeltaskname control-label']) }}
				{{ Form::text('name', null, ['class' => 'inputtaskname', 'placeholder' => 'Create a name for this task']) }}

				{{ Form::label('instructions', 'Task instructions:', ['class'=>'labeltaskinstructions control-label']) }}
				{{ Form::textarea('instructions', null, ['class' => 'inputtaskinstructions', 'placeholder' => 'Create instructions for this task']) }}

				{{ Form::label('start_url', 'Start URL:', ['class' => 'labelstarturl control-label']) }}
				{{ Form::text('start_url', null, ['class' => 'inputstarturl', 'placeholder' => 'http://www.somethingsomething.com']) }}

				{{ Form::label('end_url', 'End URL:', ['class' => 'labelendurl control-label']) }}
				{{ Form::text('end_url', null, ['class' => 'inputendurl', 'placeholder' => 'http://www.somethingsomething.com/somethings']) }}	

				{{ Form::label('max_time', 'Max. time:', ['class' => 'labelmaxtime control-label']) }}
				{{ Form::select('max_time', ['10' => '10 sec', '20' => '20 sec', '30' => '30 sec', '40' => '40 sec', '50' => '50 sec', '60' => 'Over a minute'], null, ['class'=>'inputmaxtime']) }}
		</div>
		<div class="createtest-submitbutton col-md-12">
			<button type="submit" id="createtaskbutton-newtask" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Save task</button>
			<a href="{{route('questions.create', ['testId'=>$testId])}}" id="createtaskbutton-continue" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Go to Questions
	        </a>
	    </div>
	</div>
				{!! Form::close() !!}
@if(count($existingtasks)>0)
	<div class="existingtasks-bar col-md-2">
		<div class="existingtasks-headline">
			<h3>Existing tasks</h3>
		</div>
		<div class="tasks-info">
		@foreach($existingtasks as $thistask)
			<hr>
			<p id="firstofeachtask"><strong>Name:</strong> {{$thistask->name}}</p>
			<p><strong>Instructions:</strong> {{$thistask->instructions}}</p>
			<p><strong>Start url:</strong> {{$thistask->start_url}}</p>
			<p><strong>End url:</strong> {{$thistask->end_url}}</p>
			<p><strong>Max time:</strong> {{$thistask->max_time}}</p>
			<div class="existingtasks-buttons">
				{!! Html::linkRoute('tasks.edit', 'Edit', ['id' => $thistask->id, 'testId' => $testId ], ['class'=>'existingtask-editbutton btn btn-warning']) !!}

				{!! Form::open(['action' => ['TaskController@destroy', $thistask->id], 'method' => 'DELETE']) !!}
					{{ Form::hidden('test_id', $thistask->test_id) }}
				{!! Form::submit('Delete',['class'=>'existingtask-deletebutton btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
			<hr>
		@endforeach
		</div>
	</div>
@endif
</div> <!-- end of row in createtestnavbar-->


@endsection