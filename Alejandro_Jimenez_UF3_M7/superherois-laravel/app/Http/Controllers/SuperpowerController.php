<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Superpower;

class SuperpowerController extends Controller
{
 	public function index()
    {
                $superpowers = Superpower::Paginate (10);    

        return view('superpowers.index' ,compact('superpowers'));
    }

    public function create()
    {
        
        return view("superpowers.create");
    }
    public function edit($id)
    {
        
        $superpowers = Superpower::findOrFail($id);
      return view('superpowers.edit' ,compact('superpowers'));
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
        $superpowers = Superpower::findOrFail($id);
        // carreguem la vista i li passem el planeta que volem visualitzar
        return view('superpowers.show',compact('superpowers'));
    }

 public function destroy($id)
    {
        //  Obtenim el planeta que volem esborrar
        $superpowers = Superpower::findOrFail($id);
        // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
        // es produiria un error en l'esborrat!!!!
        try {
            $result = $superpowers->delete();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
             return redirect()->route('superpower.index')
                        ->with('error','Error esborrant el supoder');
        }   
        return redirect()->route('superpower.index')
                        ->with('success','Superpoder esborrat correctament.');    
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',            
        ]);
    
        // Primera forma: breu,insegura, necessita tenir array $fillable al model
        Superpower::create($request->all());
     
        return redirect()->route('superpower.index')
                        ->with('success','Superpoder creat correctament.');
       
    }


}
