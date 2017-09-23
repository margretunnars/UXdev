@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

@include('partials/_createtestnavbar')

	<div class="createquestion-triangle-selector col-md-1">
	</div>
	<div class="create-test-info col-md-6">
		<div class="createquestion-headline col-md-8 col-md-offset-3">
			<h3>Questions</h3>
		</div>
		<div class="createquestion col-md-10 col-md-offset-1">
		{!! Form::open(['action' => 'QuestionController@store']) !!}

				{{ Form::hidden('test_id', $testId) }}
				{{ Form::label('question', 'Question:', ['class' => 'labelquestion control-label']) }}
				{{ Form::textarea('question', null, ['class' => 'inputquestion', 'placeholder' => 'Create here a question for qualitative feedback']) }}

				{{ Form::label('likert_scale', 'Type of response:', ['class' => 'labelresponse control-label', 'id'=>'createquestion-likertlabel']) }}

				{{ Form::label('likert_scale', 'Likert scale (1-5)', ['class' => 'control-label', 'id'=>'createquestion-radiolabel1']) }}
				{{ Form::radio('likert_scale', '1') }}

				<hr>

				{{ Form::label('likert_scale', 'Text response', ['class' => 'control-label', 'id'=>'createquestion-radiolabel2']) }}
				{{ Form::radio('likert_scale', '0') }}
		</div>
		<div class="createtest-submitbutton col-md-12">
	        <button type="submit" id="createquestionbutton-newquestion" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Save question</button>
			<a href="#" id="createquestionbutton-continue" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Go to Script</a>
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
				{!! Html::linkRoute('questions.edit', 'Edit', ['id' => $thisquestion->id, 'testId' => $testId], ['class'=>'existingtask-editbutton btn btn-warning']) !!}

				{!! Form::open(['action' => ['QuestionController@destroy', $thisquestion->id], 'method' => 'DELETE']) !!}
					{{ Form::hidden('test_id', $thisquestion->test_id) }}
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