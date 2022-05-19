<h1>Poders</h1>
<h2>Poders assignats</h2>
<table>
<tr><th>Nom</th>
	<th>Nivell</th>
	<th>Accions</th>
</tr>
 	<select>
 @foreach ($superpowers as $power)
    <tr>          
		<option>
            {{ $power->description }} 
        </option>           
        @endforeach
        </select>
    </tr>
</table>