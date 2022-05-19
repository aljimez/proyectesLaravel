Id: {{ $producte->id }} <br>
Nom: {{ $producte->nom }} <br>
Descripcio: {{ $producte-> descripcio }} <br>
<form method="POST" action="{{ url('/api/products', $producte->id) }}">

	@method('DELETE')

<input type="submit" value="esborrar">

</form>