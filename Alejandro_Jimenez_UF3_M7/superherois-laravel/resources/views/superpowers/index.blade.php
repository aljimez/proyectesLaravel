@extends('plantilla')
@section('content')
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Superherois!</title>
  </head>
  <body>

<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>            
    @endif

    @if (session('error'))
        <div class="alert alert-danger">            
            {{ session('error') }}            
        </div>            
    @endif


    <div>
        <a href="{{ route('superpower.create') }}">Nou Superpoder</a>
    </div>

    <div>
        <h3>Superpowers</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Descripció</th>           
                    <th>Operacions</th>
                    </tr>
            </thead>
                <tbody>
                @foreach ($superpowers as $superpower)
                <tr>
                    <td>{{ $superpower->id }}</td>
                    <td>{{ $superpower->description }}</td>
                    <td>                
                       <a href="{{ route('superpower.show',$superpower->id) }}" class="btn btn-success">Mostrar</a>
                                
                       <a href="{{ route('superpower.edit',$superpower->id) }}" class="btn btn-danger">Actualitzar</a>
                                
                        <a href="{{ route('superpower.destroy',$superpower->id) }}" class="btn btn-secondary">Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>

    <div>
     {{ $superpowers->links('pagination::bootstrap-4') }}
    </div>
</div>


</body>
</html>
@endsection