<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registerOld as registerOld;
use App\Models\departamentos as departamentos;
use App\Models\ciudades as ciudades;
use App\Models\monitores as monitores;
use App\Models\tipoTiempo as tipoTiempo;

class RegisterOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RegisterOld = RegisterOld::
        join('ciudades', 'ciudades.id_ciudad', '=', 'register_olds.idplace')
        ->join('departamentos', 'departamentos.cod_departamento', '=', 'ciudades.cod_departamento')
        ->join('monitores', 'monitores.idmonitor', '=', 'register_olds.idmonitor')
        ->join('tipo_tiempos', 'tipo_tiempos.idtipotiempo', '=', 'register_olds.idtipotiempo')
        ->where('borrado','=','0')
        ->get();
     
        return view('registerold.index',[
            'registrosold'=>$RegisterOld,
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
        //dd($citys);
        $monitores = monitores::get();
        $monitores = json_decode(json_encode($monitores), true);

        $tipoTiempo = tipoTiempo::get();
        $tipoTiempo = json_decode(json_encode($tipoTiempo), true);
        

        return view('registerold.create',[
            'citys' =>$citys,
            'monitores' =>$monitores,
            'tipoTiempo' =>$tipoTiempo
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

  
        $request->validate([
            'name_lastname' => 'required',
            'email' => 'email:rfc,dns',
            'age' => 'numeric|max:100',
            'time_converted' => 'numeric',
            'telephones' => 'numeric',

        ],
        [
            'name_lastname.required' => 'El Nombre y Apellido Es Obligatorio',
            'email.email' => 'El correo debe tener formato correo@email.com',
            'age.numeric' => 'El campo edad debe ser numerico',
            'time_converted.numeric' => 'El campo Tiempo Convertido debe ser numerico',
            'telephones.numeric' => 'El campo Telefonos debe ser numerico',
        ]
    );

        

        $registerOld = new RegisterOld();
        $registerOld->idmonitor = $request->get('idmonitor');
        $registerOld->name_lastname = $request->get('name_lastname');
        $registerOld->telephones = $request->get('telephones');
        $registerOld->age = $request->get('age');
        $registerOld->date_birthday = $request->get('date_birthday');
        $registerOld->church = $request->get('church');
        $registerOld->idplace = $request->get('idplace');
        $registerOld->ministery = $request->get('ministery');
        $registerOld->time_converted = $request->get('time_converted');
        $registerOld->idtipotiempo = $request->get('idtipotiempo');
        $registerOld->franja = $request->get('franja');
        $registerOld->email = $request->get('email');
        if($registerOld->save()){
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citys = departamentos::
        join('ciudades', 'ciudades.cod_departamento', '=', 'departamentos.cod_departamento')
        ->get();
        $citys = json_decode(json_encode($citys), true);
        //dd($citys);
        $monitores = monitores::get();
        $monitores = json_decode(json_encode($monitores), true);

        $tipoTiempo = tipoTiempo::get();
        $tipoTiempo = json_decode(json_encode($tipoTiempo), true);

        $registerOld = registerOld::where('idregisterold','=',$id)->get();
        $registerOld = json_decode(json_encode($registerOld), true);
        

        return view('registerold.edit',[
            'citys' =>$citys,
            'monitores' =>$monitores,
            'tipoTiempo' =>$tipoTiempo,
            'registerOld' =>$registerOld
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

        $request->validate([
            'name_lastname' => 'required',
            'email' => 'email:rfc,dns',
            'age' => 'numeric|max:100',
            'time_converted' => 'numeric',
            'telephones' => 'numeric',

            ],
            [
                'name_lastname.required' => 'El Nombre y Apellido Es Obligatorio',
                'email.email' => 'El correo debe tener formato correo@email.com',
                'age.numeric' => 'El campo edad debe ser numerico',
                'time_converted.numeric' => 'El campo Tiempo Convertido debe ser numerico',
                'telephones.numeric' => 'El campo Telefonos debe ser numerico',
            ]
        );


        $registerOld = registerOld::find($id);
        $registerOld->idmonitor = $request->get('idmonitor');
        $registerOld->name_lastname = $request->get('name_lastname');
        $registerOld->telephones = $request->get('telephones');
        $registerOld->age = $request->get('age');
        $registerOld->date_birthday = $request->get('date_birthday');
        $registerOld->church = $request->get('church');
        $registerOld->idplace = $request->get('idplace');
        $registerOld->ministery = $request->get('ministery');
        $registerOld->time_converted = $request->get('time_converted');
        $registerOld->idtipotiempo = $request->get('idtipotiempo');
        $registerOld->franja = $request->get('franja');
        $registerOld->email = $request->get('email');
        if($registerOld->save()){
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registerOld = registerOld::find($id);
        $registerOld->borrado = '1';

        if($registerOld->save()){
            $msg = "Registro No Eliminado Correctamente";
        }else{
            $msg = "Registro Eliminado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'../'
        ]);
    }
}