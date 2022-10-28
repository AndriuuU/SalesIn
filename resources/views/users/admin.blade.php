@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center text-mute"> {{ __("Usuarios") }} </h1>

    	@forelse($users as $user)
	        <div class="panel panel-default">
	            <div class="panel-heading">
	            	<a > {{ $user->name }} </a>
				</div>
	        </div>
    	@empty
	    <div class="alert alert-danger">
	        {{ __("No hay ningún foro en este momento") }}
	    </div>
    	@endforelse
		@if($users->count())
            Que pasa
        @endif

        </div>
    </div>
@endsection
