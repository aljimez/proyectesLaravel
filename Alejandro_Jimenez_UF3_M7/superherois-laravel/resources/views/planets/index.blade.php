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
    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

<div>
    <a href="{{ route('planets.create') }}">Nou planeta</a>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>           
                <th>Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($planets as $planet)
            <tr>
                <td>{{ $planet->id }}</td>
                <td>{{ $planet->name }}</td>
               
                <td>                
                   <a href="{{ route('planets.show',$planet->id) }}"class="btn btn-success">Mostrar</a> 
                
                            
                   <a href="{{ route('planets.destroy',$planet->id) }}"class="btn btn-secondary">Esborrar</a> 
                
                            
                   <a href="{{ route('planets.edit',$planet->id) }}"class="btn btn-danger">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


<div>
     {{ $planets->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection
</body>