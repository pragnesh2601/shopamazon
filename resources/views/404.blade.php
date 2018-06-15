@extends('layouts.app')

@section('content')
	<div class="error-404">  	
    	<div class="error-page-left">
    		<img src="images/404.png" alt="">
    	</div>
    	<div class="error-right">
	    	<h2>Oops! Page Not Open</h2>
	    	<h4>Nothing Is Found Here!!</h4>
	    	<a href="{{ url('/') }}">Go Back</a>
    	</div>
    </div>
@endsection