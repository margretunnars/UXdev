@extends('main')

@section('content')

<section>
	<div class="row">
		<div class="fordevelopers-headline col-md-12">
			<h2> UXdev testing tool is designed for web developers during development cycles!</h2>
		</div>
	</div> <!-- end of row-->
	<div class="row">
		<div class="fordevelopers-main1">
			<div class="fordevelopers-info col-md-6">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis tincidunt ipsum sit amet feugiat. Quisque ut ligula varius, vestibulum orci non, aliquet mi. Vivamus mollis lectus est, eget gravida libero viverra nec. Donec fermentum nibh et tempor dictum. Integer non dui quis velit pellentesque viverra tristique at neque.</p>
			</div>
			<div class="fordevelopers-picture col-md-4">
				<img src="images/blank1.gif">
				<p>Lorem ipsum dolor sit amet</p>
			</div>
		</div>
	</div> <!-- end of row-->
	<div class="row">
		<div class="fordevelopers-main2">
			<div class="fordevelopers-info col-md-6" id="fordevelopers-info-last">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis tincidunt ipsum sit amet feugiat. Quisque ut ligula varius, vestibulum orci non, aliquet mi. Vivamus mollis lectus est, eget gravida libero viverra nec. Donec fermentum nibh et tempor dictum. Integer non dui quis velit pellentesque viverra tristique at neque.</p>
			</div>
			<div class="fordevelopers-picture col-md-4">
				<img src="images/blank1.gif">
				<p id="fordevelopers-caption-last">Lorem ipsum dolor sit amet</p>
			</div>
		</div>
	</div> <!-- end of row-->
	<div class="row">
		<div class="create-account-developer">
			<form action="/register" method="get">
				<button id="developer-createbutton">Create a developer account</button>
			</form>
		</div>
	</div> <!-- end of row-->
</section>

@endsection