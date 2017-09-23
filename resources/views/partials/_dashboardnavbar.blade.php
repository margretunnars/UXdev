<div class="row">
        <div class="dashboard-navbar col-md-12">
            <ul>
            	<li id="home-icon"><a href="/home"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="{{route('tests.index')}}">Tests</a></li>
                <li><a href="/results">Results</a></li>
                <li><a href="/account/details">Account</a></li>
            </ul>
            <a id="navbar-createtest" href="{{route('tests.create')}}" class="pull-right"><span id="createtest-plus" class="glyphicon glyphicon-plus"></span> Create UXtest</a>
        </div>
    </div> <!-- end of row-->