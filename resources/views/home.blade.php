@extends('main')

@section('content')

@include('partials/_dashboardnavbar')

    <div class="row">
        <div class="dashboard-greeting col-md-6 col-md-offset-5">
            <h2>Welcome, {{Auth::user()->name}}!</h2>
        </div>
    </div> <!-- end of row-->
    <div class="row">
        <div class="dashboard-statistics col-md-2 col-md-offset-1">
            <ul>
                <li id="dashboard-testscreated">Total tests created: {{count($recenttests)}}</li>
                <li>Tests in development: {{count($testsindev)}}</li>
                <li>Tests in testing: {{count($testsintesting)}}</li>
                <li>Tests finished testing: {{count($testsfinished)}}</li>
            </ul>
        </div>
        <div class="dashboard-testrecent col-md-6 col-md-offset-2">
            <h3>Your recent tests:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Test name</th>
                        <th>Test description</th>
                        <th>Date created</th>
                        <th>Get results</th>
                        <th>Download data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recenttests as $test)
                    <tr>
                        <td>{{$test->name}}</td>
                        <td>{{$test->description}}</td>
                        <td>{{$test->created_at}}</td>
                        <td><a href="/results">Click here</a></td>
                        <td><a href="#" class="home-tablebutton btn btn-primary">Download</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- end of row-->
    <div class="row"> 
        <div class="dashboard-createtest col-md-3 col-md-offset-4">
            <a href="{{route('tests.create')}}" ><button id="button-dashboard-createtest" class="btn btn-primary"> Create a new <strong>UX test</strong></button></a>
        </div>
    </div> <!-- end of row-->
</div>
@endsection
