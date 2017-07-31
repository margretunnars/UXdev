@extends('main')

@section('content')

<section>
	<div class="row">
		<div class="fortestusers-headline col-md-12">
			<h2> Do you want to get paid testing web applications?</h2>
		</div>		
	</div> <!-- end of row-->
	<div class="row">
		<div class="fortestusers-main1">
			<div class="fortestusers-info col-md-6">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis tincidunt ipsum sit amet feugiat. Quisque ut ligula varius, vestibulum orci non, aliquet mi. Vivamus mollis lectus est, eget gravida libero viverra nec. Donec fermentum nibh et tempor dictum. Integer non dui quis velit pellentesque viverra tristique at neque.</p>
			</div>
			<div class="fortestusers-picture col-md-4">
				<img src="images/blank1.gif">
				<p>Lorem ipsum dolor sit amet</p>
			</div>
		</div>
	</div> <!-- end of row-->
	<div class="row">
		<div class="fortestusers-main2">
			<div class="fortestusers-info col-md-6" id="fordevelopers-info-last">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis tincidunt ipsum sit amet feugiat. Quisque ut ligula varius, vestibulum orci non, aliquet mi. Vivamus mollis lectus est, eget gravida libero viverra nec. Donec fermentum nibh et tempor dictum. Integer non dui quis velit pellentesque viverra tristique at neque.</p>
			</div>
			<div class="fortestusers-picture col-md-4">
				<img src="images/blank1.gif">
				<p>Lorem ipsum dolor sit amet</p>
			</div>
		</div>
	</div> <!-- end of row-->
	<div class="row">
		<div class="testuser-need col-md-12">
			<p> Test users need to: </p>
		</div>
	</div> <!-- end of row-->
	<div class="row">
		<div class="testuser-list1 col-md-3">
			<ul>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
				<li>Nullam a turpis eu nisl aliquet porttitor.</li>
				<li>Integer ex leo, lacinia convallis bibendum sed, ullamcorper lobortis mi.</li>
			</ul>
		</div>
		<div class="testuser-list2 col-md-3">
			<ul>
				<li>Vivamus non elit eu enim rutrum rhoncus.</li>
				<li>In in condimentum felis.</li>
				<li>Aenean odio erat, condimentum id nulla maximus, vestibulum mollis libero.</li>
			</ul>
		</div>
		<div class="create-account-testuser">
			<form action="/register" method="get">
				<button id="testuser-createbutton">Create a test user account</button>
			</form>
		</div>
	</div> <!-- end of row-->
</section>

@endsection