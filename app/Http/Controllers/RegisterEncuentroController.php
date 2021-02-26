<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departamentos as departamentos;
use App\Models\ciudades as ciudades;
use App\Models\encuentros as encuentros;

class RegisterEncuentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuentros = encuentros::join('ciudades', 'ciudades.id_ciudad', '=', 'encuentros.place_encuentro')->join('departamentos', 'ciudades.cod_departamento', '=', 'departamentos.cod_departamento')->selectRaw('date(encuentros.date_encuentro) as date_encuentro,ciudades.nombre_ciudad,departamentos.name_departamento')->get();
     
        return view('encuentro.index',[
            'encuentros'=>$encuentros,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys = departamentos::
        join('ciudades', 'ciudades.cod_departamento', '=', 'departamentos.cod_departamento')
        ->get();
        $citys = json_decode(json_encode($citys), true);

        return view('encuentro.create',[
            'citys' =>$citys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $encuentro = new encuentros();
        $encuentro->date_encuentro = $request->get('date_encuentro');
        $encuentro->place_encuentro = $request->get('idplace');
        if($encuentro->save()){
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
        $encuentro = encuentros::where('idmonitor','=',$id)->get();
        $encuentro = json_decode(json_encode($encuentro), true);

        $citys = departamentos::
        join('ciudades', 'ciudades.cod_departamento', '=', 'departamentos.cod_departamento')
        ->get();
        $citys = json_decode(json_encode($citys), true);
        

        return view('encuentro.edit',[

            'encuentro' =>$encuentro,
            'citys' =>$citys

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
        $encuentro = encuentro::find($id);
        $encuentro->date_encuentro = $request->get('date_encuentro');
        $encuentro->idplace = $request->get('idplace');
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
        $encuentro = encuentros::where('idencuentro','=',$id);
        $encuentro->delete();

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
