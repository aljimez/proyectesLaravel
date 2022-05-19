@extends('plantilla')
@section('content')
<h2>Fitxa Superpoder</h2>
  
<div>          
	<a href="{{ route('superpower.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Descripción:</strong>
	{{ $superpowers->description }}
</div>
<strong>Superherois amb aquest poder:</strong>
<ul>
   @foreach($superpowers->superheroes as $superhero)
     	<li>
            {{ $superhero->heroname }} 
            </li>
   @endforeach
</ul>
</div>

@endsection