@extends('layouts.master')

@section('title') Login @stop

@section('content')
<div class="col-md-4 col-md-offset-4">
  <div class="panel panel-default">
    <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
    </div>
    <div class="panel-body">
            @if ($errors->has())
                    @foreach ($errors->all() as $error)
                            <div class='alert-danger alert'>{{ $error }}</div>
                    @endforeach
            @endif

						{{ Form::open(['route' => 'sessions.store']) }}
						 	<fieldset>
								<div class="form-group">
									 {{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
								</div>
								<div class="form-group">
									{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
								</div>	
							</fieldset>
							{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
						{{ Form::close() }}


		</div>
  </div>
</div>
@stop