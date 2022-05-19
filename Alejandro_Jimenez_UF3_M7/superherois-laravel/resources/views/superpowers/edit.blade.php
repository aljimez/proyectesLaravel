@extends('plantilla')
@section('content')
<div>
	<a href="{{ route('superpower.index') }}"> Tornar</a>
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
	<form action="{{ route('superpower.edit',$superpowers->id) }}" >
	    @csrf
	    <strong>Name:</strong>
	    <input type="text" name="name" value="{{ $superpowers->name }}">    
	    <input type="submit" value="Actualitzar">            
	   
	</form>
</div>
@endsection