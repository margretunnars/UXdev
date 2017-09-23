@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_edittestnavbar')

	<div class="createquestion-triangle-selector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
		<div class="createquestion-headline col-md-8 col-md-offset-3">
			<h3>Questions - Test {{$test->name}}</h3>
		</div>
		<div class="createquestion col-md-10 col-md-offset-1">
		{!! Form::model($question, ['action' => ['QuestionController@update', $question->id], 'method'=>'PUT']) !!}

				{{ Form::hidden('test_id', $question->test_id) }}
				{{ Form::label('question', 'Question:', ['class' => 'labelquestion control-label']) }}
				{{ Form::textarea('question', $question->question, ['class' => 'inputquestion', 'placeholder' => 'Create here a question for qualitative feedback of your website']) }}

				{{ Form::label('likert_scale', 'Type of response:', ['class' => 'labelresponse control-label', 'id'=>'createquestion-likertlabel']) }}

				{{ Form::label('likert_scale', 'Likert scale (1-5)', ['class' => 'control-label', 'id'=>'createquestion-radiolabel1']) }}
				{{ Form::radio('likert_scale', '1', $question->likert_scale) }}

				<hr>

				{{ Form::label('likert_scale', 'Text response', ['class' => 'control-label', 'id'=>'createquestion-radiolabel2']) }}
				{{ Form::radio('likert_scale', '0', $question->likert_scale) }}
		</div>
		<div class="edit-test-submit form-group">
			<div class="col-md-6 col-md-offset-3">
				<button type="submit" id="editbutton-questions" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Save question</button>
	    	</div>
	    </div>
	    <div class="col-md-11">
        	<a href="{{route('tests.index')}}" class="gobackbutton-questions btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Go back to Tests</a>
        	<a href="#" class="goforwardbutton-questions btn btn-primary"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Go forward to Script</a>
        </div>
	</div>
	{!! Form::close() !!}
	@if(count($existingquestions)>0)
		<div class="existingtasks-bar col-md-2">
			<div class="existingtasks-headline">
				<h3>Existing questions</h3>
				<h4>Test name</h4>
			</div>
			<div class="tasks-info">
			@foreach($existingquestions as $thisquestion)
				<hr>
				<p id="firstofeachtask"><strong>Question:</strong> {{$thisquestion->question}}</p>
				<p><strong>Type of response:</strong> {{$thisquestion->likert_scale}}</p>
			<div class="existingtasks-buttons">
			@if($question->id != $thisquestion->id)
					{!! Html::linkRoute('questions.edit', 'Edit', ['id' => $thisquestion->id, 'testId' => $testId], ['class'=>'existingtask-editbutton btn btn-warning']) !!}
			@endif
					{!! Form::open(['action' => ['QuestionController@destroy', $thisquestion->id], 'method' => 'DELETE']) !!}
						{{ Form::hidden('test_id', $thisquestion->test_id) }}
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