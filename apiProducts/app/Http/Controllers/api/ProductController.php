<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource as ProductResource;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtenim el llistat de tots els productes
        $productes = Product::all();

        $response = [
          'success' => true,  // Per indicar que Tot ha anat bé
          'message' => "Llista productes recuperada", // missatge
          'data' => ProductResource::collection($productes), // en data posem la llista de productes
        ];

        // convertim l'array associatiu a format JSON i retornem STATUS 200,
        // és a dir, tot ok!
        return response()->json($response, 200);             

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("product.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request-> all();

    $validator = Validator::make(

    $input,

            [
            'nom' => 'required|max:25',
            'preu' => 'required|numeric|min:0',
            'descripcio' => 'required|max:256',
            ]

    );

    if ($validator->fails()) {

$response = [

'success' => false,
'message' => "Error alta",
'data' => $validator->errors(),
];
            return response()->json($response, 404); 
}else{
$producte = Product::create($input);
$response = [
'success' => true,
'message' => "Alta correcta",
'data' => new ProductResource($producte),
];
return response()->json($response,200);
}
    

/*

    $producte = new Product;
    $producte->nom = $request->nom;
    $producte->descripcio = $request ->descripcio;
    $producte->preu = $request->preu;
    $producte->save();

*/

        $producte = Product::create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // Busquem un producte en concret segons els seu id
        $producte = Product::find($id);
        return new ProductResource($producte);

        // No s'ha trobat el producte 
        if($producte==null) {
            $response = [
              'success' => false,
              'message' => "Producte no trobat",            
            ];
            return response()->json($response, 404); 

        }
        else { // El producte s'ha trobat

            $response = [
              'success' => true,
              'data'    => new ProductResource($producte),
              'message' => "Producte recuperat",
            ];
            return response()->json($response, 200); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       $producte = Product::find($id);

             if($producte==null) {
            $response = [
            'success' => false,
            'message' => "Producte no trobat",            
            ];
            return response()->json($response, 404); 

        }
        else { // El producte l'hem trobat

            // posar dins try-catch en cas de haver-hi relacions clau forana!!

        $input = $request-> all();
  /*
        $input,

            [
            'nom' => $producte['nom'],
            'preu' => $producte['preu'],
            'descripcio' => $producte['descripcio'],
            ]
    */

            $response = [
            'success' => true,
            'data'    => $producte,
            'message' => "Producte actualitzat",
            ];

            return response()->json($response, 200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            
        $producte = Product::find($id);

             if($producte==null) {
            $response = [
            'success' => false,
            'message' => "Producte no trobat",            
            ];
            return response()->json($response, 404); 

        }
        else { // El producte l'hem trobat

            // posar dins try-catch en cas de haver-hi relacions clau forana!!
            $producte->delete();

            $response = [
            'success' => true,
            'data'    => $producte,
            'message' => "Producte esborrat",
            ];

            return response()->json($response, 200);
        }
        
}
    
    public function preuInferior($price){
    $productes = Product::where('preu', '<', $price)->get();   
    $response = [
          'success' => true,  // Per indicar que Tot ha anat bé
          'message' => "Llista productes recuperada", // missatge
          'data' => ProductResource::collection($productes), // en data posem la llista de productes
        ];
                return response()->json($response, 200);             

}

    public function preview($id){

        $producte = Product::findOrFail($id);

        return view('product.preview' , compact('producte'));

    }

}
