<header>
		<div class="row">
			<div class="main-header col-md-12">
				<div class="logo-header col-md-3">
					<h1><a href="/">UXdev</a></h1>
				</div>
				@if(Auth::guest()) <!--http://laravel-recipes.com/recipes/81/determining-if-no-user-is-logged-in-->
				<div class="nav-header col-md-6">
					<ul>
						<li><a href="/fordevelopers">For developers</a></li>
						<li><a href="/howitworks">How it works</a></li>
						<li><a href="/about">About</a></li>

					</ul>
				</div>
					<div class="login-header col-md-3">
						<ul>
							<li><a id="createaccount" href="/register">Create an account</a></li>
							<li><a href="/login">Sign in</a></li>
						</ul>
					</div>
				@else
					<div class="btn-group col-md-9" id="dashboard-dropdown">
	                    <a href="" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-expanded="false">
	                   	    {{ Auth::user()->name }}<span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu pull-right">
	                        <li><a href="{{ url('home') }}">Dashboard</a></li>
	                        <li><a href="{{ url('tests') }}">Tests</a></li>
	                        <li><a href="{{ url('results') }}">Results</a></li>
	                        <li><a href="{{ url('account') }}">Account</a></li>
	                        <li role="separator" class="divider"></li>
	                        <li><a href="{{ route('logout') }}"
	        					onclick="event.preventDefault();
	                         	document.getElementById('logout-form').submit();">
	                            Logout
	                            </a>
	                        </li>
	                    </ul>
	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                        {{ csrf_field() }}
	                    </form>
	                </div>
	                @endif
			</div> <!--end of main-header-->
		</div> <!-- end of row-->
</header>