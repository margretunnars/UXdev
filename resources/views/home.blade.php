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
                <li>Projects created: </li>
                <li id="dashboard-testscreated">Tests created:</li>
                <li>Tests in development:</li>
                <li>Tests in testing:</li>
                <li>Tests finished testing:</li>
            </ul>
        </div>
        <div class="dashboard-testrecent col-md-6 col-md-offset-2">
            <h3>Your recent tests:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Test name</th>
                        <th>Date created</th>
                        <th>Get results</th>
                        <th>Quick download data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Login and signup</td>
                        <td>Test Login</td>
                        <td>10/06/17</td>
                        <td><a href="#">Click here</a></td>
                        <td><button id="dashboard-download-button">Download</button></td>
                    </tr>
                    <tr>
                        <td>Login and signup</td>
                        <td>Test Signup</td>
                        <td>11/06/17</td>
                        <td><a href="#">Click here</a></td>
                        <td><button id="dashboard-download-button">Download</button></td>
                    </tr>
                    <tr>
                        <td>Search</td>
                        <td>Search test</td>
                        <td>02/07/17</td>
                        <td><a href="#">Click here</a></td>
                        <td><button id="dashboard-download-button">Download</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end of row-->
    <div class="row"> 
        <div class="dashboard-createtest col-md-3 col-md-offset-4">
            <button id="button-dashboard-createtest"> Create a new <strong>UX test</strong>
            </button>
        </div>
    </div> <!-- end of row-->
</div>
@endsection
