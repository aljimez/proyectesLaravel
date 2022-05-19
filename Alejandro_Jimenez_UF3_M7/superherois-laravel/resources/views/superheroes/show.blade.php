@extends('plantilla')
@section('content')
<h2>Fitxa Superherois</h2>
  
<div>          
	<a href="{{ route('superheroes.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Llista:</strong>
	{{ $superheroes->heroname }}<br>
	{{ $superheroes->realname }}<br>
	{{ $superheroes->gender }}<br>
	{{ $superheroes->planet_id }}<br>
	<strong>Planet:</strong>
        {{ $superheroes->planet->name }}
</div>
 <strong>Powers:</strong>
        <ul>
        @foreach($superheroes->superpowers as $power)
            <li>
            {{ $power->description }} 
                    {{ $power->pivot->amount }}
            </li>
        @endforeach
        </ul>
    </div>
@endsection