@extends('plantilla')
@section('content')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Superherois!</title>
  </head>
  <body>
    <div>        
        <h2>Superherois</h2>
    </div>
    <div>
        <a href="{{ route('superheroes.create') }}"> Nou superheroi</a>
    </div>
        
   
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@include('superheroes.search')

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Hero Name</th>
                <th>Gender</th>                        
                <th>Operacions</th>
            </tr>
        </thead>
        
        @foreach ($superheroes as $superhero)
        
        <tr>
            <td>{{ $superhero->id }}</td>
            <td>{{ $superhero->heroname }}</td>
            <td>{{ $superhero->gender }}</td>                     
            <td>     
                <a href="{{ route('superheroes.powers',$superhero->id) }}">Poders</a> 
                  <a href="{{ route('superheroes.show',$superhero->id) }}">Mostrar</a>        
                  <a href="{{ route('superheroes.edit',$superhero->id) }}">Editar</a>
                  <a href="{{ route('superheroes.destroy',$superhero->id) }}">Esborrar</a>               
            </td>
        </tr>
        @endforeach
    </table>
   <div>
     {{ $superheroes->links('pagination::bootstrap-4') }}
    </div>
    @ensection
</body>