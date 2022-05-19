@extends('plantilla')
@section('content')
<div>
	<a href="{{ route('planets.index') }}"> Tornar</a>
</div>          
<div> 
	@if ($errors->any())
	<ul>
	    @foreach ($errors->all() as $error)
	    	<li>{{ $error }}</li>
	    @endforeach
	</ul>        
        @endif
</div>
<div>
	<form action="{{ route('planets.update',$planet->id) }}" method="POST">
	    @csrf
	    <strong>Name:</strong>
	    <input type="text" name="name" value="{{ $planet->name }}">
	            
	    <input type="submit" value="Actualitzar">            
	   
	</form>
</div>
@endsection