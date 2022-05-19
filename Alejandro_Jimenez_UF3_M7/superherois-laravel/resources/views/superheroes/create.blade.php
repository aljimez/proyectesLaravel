@extends('plantilla')
@section('content')
<div>
	<a href="{{ route('superheroes.index') }}"> Tornar</a>
</div>  
<form method="POST" action="/superheroes/store">
@csrf
Nom real: <input type="text" name="realname"><br>
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

<button type="submit">Enviar</button>
</form>

@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>    
@endif

@endsection