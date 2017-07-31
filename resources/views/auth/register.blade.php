@extends('main')

@section('content')

<section>
	<div class="row">
		<div class="register-heading col-md-12">
			<h2>Do you want to create a UXdev account?</h2>
		</div>
	</div> <!-- end of row -->
	<div class="row">
    	<div class="register-form">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
            	<div class="form-group">
                    <label id="name-label" for="name" class="col-md-3 control-label">Name</label>

                    <div class="col-md-6">
                     	<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label id="email-label" for="email" class="col-md-3 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="form-group">
                    <label id="password-label" for="password" class="col-md-3 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                </div>
                <div class="form-group">
                    <label id="passwordconfirm-label" for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
               	</div>
               	<div class="form-group">
                    <div class="col-md-9">
                        <button id="createaccount-button"type="submit" class="btn btn-primary">
                            Create account
                        </button>
                    </div>
                </div>
        	</form>
        </div> <!-- end of row-->
    </div>
</section>

@endsection