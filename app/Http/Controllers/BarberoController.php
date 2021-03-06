<?php

namespace App\Http\Controllers;

use App\Models\barbero;
use Illuminate\Http\Request;
use Session;


class BarberoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $mensaje = Session :: get('mensaje');

        $nombre = $request->get('nombre');

        $barberos['barberos']=barbero::where('nombre','LIKE',"%$nombre%")
        ->orderBy('id','desc')
        ->paginate(2);
        return view('barberos.index', $barberos)->with('mensaje',$mensaje);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barberos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosBarbero=request()->except('_token');
        barbero::insert($datosBarbero);    
        return redirect('/barberos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barbero  $barbero
     * @return \Illuminate\Http\Response
     */
    public function show(barbero $barbero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barbero  $barbero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $barbero=barbero::findOrFail($id);
        return view('barberos.edit', compact('barbero'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barbero  $barbero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $barbero=barbero::findOrFail($id);
        $barbero->nombre=$request->input('nombre');
        $barbero->telefono=$request->input('telefono');
        $barbero->timestamps=false;


        $barbero->save();
        return redirect('/barberos');   


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barbero  $barbero
     * @return \Illuminate\Http\Response
     */
    public function destroy($barbero)
    {
        //
       
        try{
            barbero::destroy($barbero);
            return redirect('barberos');
           } catch(\Exception $exception){
            $mensaje = 'No se pudo Eliminar';
       // echo "CITAS";
       // cita::destroy($cita);
             return redirect('barberos')->with('mensaje',$mensaje);
        }
    }
}
