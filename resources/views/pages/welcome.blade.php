@extends('main')

@section('content')

<section>
		<div class="row">
			<div class="welcome-headline">
				<h2> A remote usability testing tool specifically designed for agile web development! </h1>
			</div>
		</div> <!-- end of row-->
		<div class="row">
			<div class="welcome-description col-md-5">
				<p> To get frequent feedback of User experience on your website which is still in development, connect to our platform and start running UX tests </p>
				<p> To cope with the fast-paced technology environment when developing a website - simple User expereince testing is key to get feedback as often as you can during development!</p>
			</div>
			<div class="welcome-image col-md-7">
				<img src="images/teamdev.jpg" alt="team">
			</div>
		</div> <!-- end of row-->
		<div class="row">
			<div class="welcome-info ">
				<div class="info-headline col-md-4 col-md-offset-5">
					<h2><strong>Features:</strong></h2>
				</div>
				<div class="welcome-info1 col-md-6">
					<ul>
						<li>Simple UX testing creation process </li>
						<li>Create as many tasks as you want for quantitative results</li>
						<li>Create as many questions as you want for qualitative results</li>
					</ul>
				</div>
				<div class="welcome-info2 col-md-6">
					<ul>
						<li>Connect to our API by using Javascript tag in your HTML of testing web pages </li>
						<li>After UX testing has been completed - access your results by downloading a .csv file</li>
						<li>Start analysing your UX results</li>
					</ul>
				</div>
			</div>
		</div> <!-- end of row-->

</section>

@endsection