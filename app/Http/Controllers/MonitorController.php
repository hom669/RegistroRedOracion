<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monitores as monitores;
use App\Models\registerOld as registerOld;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitor = monitores::get();
     
        return view('monitor.index',[
            'monitor'=>$monitor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'name_monitor' => 'required|regex:/^[\pL\s]+$/u'

            ],
            [
                'name_monitor.required' => 'El Nombre del Monitor es obligatorio',
                'name_monitor.regex' => 'El Nombre del Monitor es solo Alfabetico'
            ]
        );
        $monitor = new monitores();
        $monitor->name_monitor = $request->get('name_monitor');
        if($monitor->save()){
            $msg = "Registro Almacenado Correctamente";
        }else{
            $msg = "Registro No Almacenado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'create'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitor = monitores::where('idmonitor','=',$id)->get();
        $monitor = json_decode(json_encode($monitor), true);
        

        return view('monitor.edit',[

            'monitor' =>$monitor

        ]);
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
        $monitor = monitores::find($id);
        $monitor->name_monitor = $request->get('name_monitor');
        if($monitor->save()){
            $msg = "Registro Actualizdo Correctamente";
        }else{
            $msg = "Registro No Actualizado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'../'
        ]);
        
    }

    public function confirmdestroy($id)
    {

        
        return view('confirm',[
            'mensaje' =>'Esta seguro que quiere eliminar el registro',
            'can' =>'../',
            'ok' =>'../destroy/'.$id,

        ]);

    }
 

    public function destroy($id)
    {
        $registerOld = registerOld::where('idmonitor','=',$id);
        $registerOld->delete();

        $monitor = monitores::find($id);
        if($monitor->delete()){
            $msg = "Registro Eliminado Correctamente";
        }else{
            $msg = "Registro No Eliminado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'../'
        ]);

    }
}
