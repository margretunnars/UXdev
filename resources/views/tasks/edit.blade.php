@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_edittestnavbar')

	<div class="createtask-triangle-selector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
		<div class="createtask-headline col-md-8 col-md-offset-3">
			<h3>Tasks - Test {{$test->name}}</h3>
		</div>
		<div class="createtask col-md-10 col-md-offset-1">
		{!! Form::model($task, ['action' => ['TaskController@update', $task->id], 'method' => 'PUT']) !!}

				{{ Form::hidden('test_id', $task->test_id) }}
				{{ Form::label('name', 'Task name:', ['class' => 'labeltaskname control-label']) }}
				{{ Form::text('name', $task->name, ['class' => 'inputtaskname', 'placeholder' => 'Create a name for this task']) }}

				{{ Form::label('instructions', 'Task instructions:', ['class'=>'labeltaskinstructions control-label']) }}
				{{ Form::textarea('instructions', $task->description, ['class' => 'inputtaskinstructions', 'placeholder' => 'Create instructions for this task']) }}

				{{ Form::label('start_url', 'Start URL:', ['class' => 'labelstarturl control-label']) }}
				{{ Form::text('start_url', $task->start_url, ['class' => 'inputstarturl', 'placeholder' => 'http://www.somethingsomething.com']) }}

				{{ Form::label('end_url', 'End URL:', ['class' => 'labelendurl control-label']) }}
				{{ Form::text('end_url', $task->end_url, ['class' => 'inputendurl', 'placeholder' => 'http://www.somethingsomething.com/somethings']) }}	

				{{ Form::label('max_time', 'Max. time:', ['class' => 'labelmaxtime control-label']) }}
				{{ Form::select('max_time', ['10' => '10 sec', '20' => '20 sec', '30' => '30 sec', '40' => '40 sec', '50' => '50 sec', '60' => 'Over a minute'], $task->max_time, ['class'=>'inputmaxtime']) }}
		</div>
		<div class="edit-test-submit form-group">
			<div class="col-md-6 col-md-offset-3">
				<button type="submit" id="editbutton-tasks" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Save task</button>
	    	</div>
	    </div>
	    <div class="col-md-11">
        	<a href="{{route('tests.index')}}" class="gobackbutton-tasks btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Go back to Tests</a>
        	@if($question)
        		<a href="{{route('questions.edit', ['id' => $question->id,'testId' => $test->id])}}" class="goforwardbutton-tasks btn btn-primary"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Go forward to Edit questions</a>
        	@else
        		<a href="{{route('questions.create', ['testId' => $testId])}}" class="goforwardbutton-tasks btn btn-primary"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Go forward to Create questions</a>
        	@endif

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
			@if($task->id != $thistask->id)
				{!! Html::linkRoute('tasks.edit', 'Edit', ['id' => $thistask->id, 'testId' => $test->id ], ['class'=>'existingtask-editbutton btn btn-warning']) !!}
			@endif
				{!! Form::open(['action' => ['TaskController@destroy', $thistask->id], 'method' => 'DELETE']) !!}
				 {{ Form::hidden('test_id', $thistask->test_id) }}
				{!! Form::submit('Delete',['class'=>'existingtask-deletebutton btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
			<hr>
		@endforeach
		</div>
		<div class="createnewtask">
			<a class="createnewtask-button btn btn-success" href="{{route('tasks.create', ['testId' => $test->id])}}"><span class="glyphicon glyphicon-plus"></span> Create task</a>
		</div>
	</div>
@endif
</div> <!-- end of row in createtestnavbar-->


@endsection