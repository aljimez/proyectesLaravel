@extends('plantilla')
@section('content')
<h2>Fitxa Planeta</h2>
  
<div>          
	<a href="{{ route('planets.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Name:</strong>
	{{ $planet->name }}
</div>
<strong>Habitants il·lustres:</strong>
<ul>
     @foreach($planet->superheroes as $super)
          <li>{{ $super->heroname }}</li>
     @endforeach
</ul>
@endsection