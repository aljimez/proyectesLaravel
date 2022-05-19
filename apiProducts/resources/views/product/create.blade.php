<h1>Formulari creació de producte</h1>



<div>           
    <form action="{{url('api/products')}}" method="POST">
        @csrf
           
        <strong>Name:</strong>
        <input type="text" name="nom"><br>
                <strong>Preu:</strong>
                <input type="text" name="preu"><br>
                <strong>Descripcio:</strong>
                <input type="text" name="descripcio"><br>
        <input type="submit" value="Desar">     
       
    </form>
</div>

<div>

</div>