@extends('plantilla')
@section('content')
<div>
	<a href="{{ route('superheroes.index') }}"> Tornar</a>
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
	<form action="{{ route('superheroes.edit',$superheroes->id) }}" method="POST">
	    @csrf
</select><br><br>   Nom real: <input type="text" name="realname"><br>
Nom d'heroi: <input type="text" name="heroname"><br>
Nom del planeta: 
<select name="planet_id">
	@foreach($planetes as $planets)
<option>{{ $planets->name }}</option>
	@endforeach
</select>
<select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
</select><br><br>
	    <input type="submit" value="Actualitzar">            
	   
	</form>
</div>
@endsection