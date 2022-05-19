<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Planet; // Afegir la classe Model!!!!!!!!!!!!!!!!!!!

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recuperem una col·lecció amb tots els planetes de la BD
        $planets = Planet::Paginate (10);    
        // Carreguem la vista planets/index.blade.php 
        // i li passem la llista de planetes
        return view('planets.index',compact('planets'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create()
    {
        //
        return view("planets.create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function edit($id)
    {
        //
        $planet = Planet::findOrFail($id);
        return view('planets.edit',compact('planet'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        // Obtenim un objecte Planet a partir del seu id
        $planet = Planet::findOrFail($id);
        // carreguem la vista i li passem el planeta que volem visualitzar
        return view('planets.show',compact('planet'));
    }


  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',            
        ]);
    
        // Primera forma: breu,insegura, necessita tenir array $fillable al model
        Planet::create($request->all());
     
        return redirect()->route('planets.index')
                        ->with('success','Planeta creat correctament.');
       
    }
        
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',           
        ]);
    
        // Opcio 1
        $planet = Planet::findOrFail($id);
        $planet->update($request->all());

        return redirect()->route('planets.index')
                        ->with('success','Planet actualitzat correctament');
    }

   
    public function destroy($id)
    {
        //  Obtenim el planeta que volem esborrar
        $planet = Planet::findOrFail($id);
        // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
        // es produiria un error en l'esborrat!!!!
        try {
            $result = $planet->delete();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
             return redirect()->route('planets.index')
                        ->with('error','Error esborrant el planeta');
        }   
        return redirect()->route('planets.index')
                        ->with('success','Planeta esborrat correctament.');    
    }

}