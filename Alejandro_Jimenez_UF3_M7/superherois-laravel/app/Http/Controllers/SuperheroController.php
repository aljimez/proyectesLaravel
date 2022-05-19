<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superpower;
use App\Models\Superhero;
use App\Models\Planet;

class SuperheroController extends Controller
{
    
	public function index(Request $request)
    {
		$filters = $request->all('searchName', 'searchGender');
        
        // Preparo una consulta sobre el model Superhero, indicant que voldrè carregar també els 
        // models Planet associats, per evitar el problema N+1
        $query = Superhero::with('planet');
        
        // o bé podríem haver fet, si iniciem una consulta sense cap mètode inicial
        // $query = Superhero::Query();

        // Si s'ha enviat el paràmetre searchName
        if ($request->has('searchName')) {
          $query->where('heroname','like','%'.$filters['searchName'].'%');
        }

        // Si s'ha enviat el pàrametre i té valor
        if ($request->filled('searchGender')) {
            $query->where('gender',$filters['searchGender']);
        }
        $superheroes = $query->paginate(5)->withQueryString();
        // El withQueryString serveix per a que al paginar s'afegeixin també els paràmetres GET 
        // que hi ha en la crida a la URL actual. En aquest exemple ?searchName=valor$searchGender=valor
        
        return view('superheroes.index',compact('superheroes','filters'));
                   
    }
    public function powers ($id){
    	$superheroes= Superhero::findOrFail($id);
     $superheroes = Superhero::all(); 
     $superheroes->superpowers;   
        return view('superheroes.powers' ,compact('superheroes'));
                return view('superheroes.powers' ,compact('superpowers'));

    }
    public function create()
    {
        // Recuperem la col·lecció de planetes
        $superheroes = Superhero::all();
                $planetes = Planet::all();

 
        return view('superheroes.index',compact('superheroes'));
        return view('superheroes.create',compact('superheroes','planetes'));

    }
    public function store(Request $request)
    {
        
        $request->validate([
            'heroname' => 'required | max:25 |unique:superheroes',
            'realname' => 'required | max:75', 
            'gender' => 'required | in:male,female',
            'planet_id' => 'required|exists:planets,id',           
        ]);
    
        Superhero::create($request->all());
     
        return redirect()->route('superheroes.index')
                        ->with('success','Superheroi afegit correctament.');

    }
    public function show($id)
    {
        // Obtenim un objecte Planet a partir del seu id
        $superheroes = Superhero::findOrFail($id);
        // carreguem la vista i li passem el planeta que volem visualitzar
        return view('superheroes.show',compact('superheroes'));
    }
    public function edit($id)
    {
                        $planetes = Planet::all();

        $superheroes = Superhero::findOrFail($id);
        return view('superheroes.create',compact('superheroes'),compact('planetes'));
    }
      public function destroy($id)
    {
        //  Obtenim el planeta que volem esborrar
        $superheroes = Superhero::findOrFail($id);
        // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
        // es produiria un error en l'esborrat!!!!
        try {
            $result = $superheroes->delete();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
             return redirect()->route('superheroes.index')
                        ->with('error','Error esborrant el planeta');
        }   
        return redirect()->route('superheroes.index')
                        ->with('success','Superheroi esborrat correctament.');    
    }
     public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',           
        ]);
    
        // Opcio 1
        $Superhero = Superhero::findOrFail($id);
        $Superhero->update($request->all());

        return redirect()->route('superheroes.index')
                        ->with('success','Superheroi actualitzat correctament');
    }

}
