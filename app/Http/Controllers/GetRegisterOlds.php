<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\registerOld as registerOld;

class GetRegisterOlds extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RegisterOld = RegisterOld::
         join('encuentros', 'register_olds.idencuentro', '=', 'encuentros.idencuentro')
        ->join('ciudades as c1', 'encuentros.place_encuentro', '=', 'c1.id_ciudad')
        ->join('departamentos as d1', 'c1.cod_departamento', '=', 'd1.cod_departamento')
        ->leftJoin('ciudades', 'ciudades.id_ciudad', '=', 'register_olds.idplace')
        ->leftJoin('departamentos', 'departamentos.cod_departamento', '=', 'ciudades.cod_departamento')
        ->join('monitores', 'monitores.idmonitor', '=', 'register_olds.idmonitor')
        ->join('tipo_tiempos', 'tipo_tiempos.idtipotiempo', '=', 'register_olds.idtipotiempo')
        ->where('borrado','=','0')
        ->selectRaw('date(encuentros.date_encuentro) as date_encuentro,c1.nombre_ciudad as ciudad_encuentro,d1.name_departamento as departamento_encuentro,register_olds.idmonitor,register_olds.name_lastname,register_olds.telephones,register_olds.age,register_olds.date_birthday,register_olds.church,register_olds.idplace,register_olds.ministery,register_olds.time_converted,register_olds.idtipotiempo,register_olds.franja,register_olds.email,register_olds.idencuentro,departamentos.name_departamento,ciudades.nombre_ciudad,monitores.name_monitor,tipo_tiempos.name_tipotiempo,register_olds.idregisterold,register_olds.place')
        ->get();

        $RegisterOld = json_encode($RegisterOld);

        return $RegisterOld;
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
