<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $catalogo = Catalogo::with('user')->paginate(10);
        return view("welcome",compact("catalogo"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogo = new Catalogo;
        $title = __("Crear Producto");
        $textButton = __("Crear");
        $route = route("catalogo.store");
        return view("catalogo.create",compact("title","textButton","route"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $files = $request->file('imagenes');

            if($request->hasFile('imagenes'))
            {
                foreach ($files as $file) {
                   // $name= $file->getClientOriginalName();
                    $imgData[] =  $file->store('uploads','public');  
                }
                $catalogo = new Catalogo;
                $catalogo->nombre = $request->nombre;
                $catalogo->precio = $request->precio;
                $catalogo->portada =  $request->file('portada')->store('uploads', 'public');
                $catalogo->descripcion = "asd";
                $catalogo->imagenes = json_encode($imgData);;
                $catalogo->save();
               
            }
          
            return back()->with('success', 'File has successfully uploaded!');
        }
                    
            

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogo = Catalogo::findOrFail($id);
        return view("catalogo.show",compact("catalogo"));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
