@extends('layouts.default')

@section('content')

<div class="row form-wrapper">

	<form method="post" action="{{ route('login') }}" class="form-horizontal">
		<!-- CSRF Token -->
{{ Form::token()}}
			<div class="form-group">
				<label class="col-md-6 control-label"></label>
					
				</div>

			<!-- Email -->
			<div class="form-group{{ $errors->first('email', ' error') }}">
				<label for="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-5">
						<input class="form-control" type="email" name="email" id="email" value="{{ Input::old('email') }}" />
						{{ $errors->first('email', '<span class="alert-msg"><i class="icon-remove-sign"></i> :message</span>') }}
					</div>
			</div>

			<!-- Password -->
			<div class="form-group{{ $errors->first('password', ' error') }}">
				<label for="password" class="col-md-3 control-label">Password</label>
					<div class="col-md-5">
						<input class="form-control" type="password" name="password" id="password" value="{{ Input::old('password') }}" />
						{{ $errors->first('password', '<span class="alert-msg"><i class="icon-remove-sign"></i> :message</span>') }}
					</div>
			</div>

			 <div class="field-box">
				<label class="col-md-3 control-label checkbox-inline"></label>
				  <input type="checkbox" name="remember-me" id="remember-me" value="1" /> Remember me
				</label>
			</div>

			<!-- Form actions -->
				<div class="form-group">
				<label class="col-md-6 control-label"></label>
					<div class="col-md-5">
						<button type="submit" class="btn btn-success"><i class="icon-ok icon-white"></i> Sign in</button>
					</div>
				</div>


	</form>
</div>
@stop
