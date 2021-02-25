<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Solicitudes;
use App\Models\Company as Company;
use Http;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $requests = Solicitudes::join('company', 'company.id', '=', 'request.idcompany')->select('request.*', 'company.name AS nameCompany')->get();

        return view('request.index',[
            'solicitudes'=>$requests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Company::select('company.id','company.name')->get();
        $companys = json_decode(json_encode($companys), true);
        //dd($companys);
        return view('request.create',[
            'companys' =>$companys,
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
        

        $solicitudes = new Solicitudes();
        $solicitudes->name = $request->get('nombre');
        $solicitudes->identificacion = $request->get('identificacion');
        $solicitudes->valuerequest = $request->get('ValorSolicitud');
        $solicitudes->age = $request->get('edad');
        $solicitudes->address = $request->get('direccion');
        $solicitudes->idcompany = $request->get('selectCompany');
        if($solicitudes->save()){
            $msg = "Registro Almacenado Correctamente";
        }else{
            $msg = "Registro No Almacenado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'/requests'
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
        $solicitudedit = Solicitudes::join('company', 'company.id', '=', 'request.idcompany')->select('request.*', 'company.name AS nameCompany')->where('request.id','=',$id)->get();
        $solicitudedit = json_decode(json_encode($solicitudedit), true);

        $companys = Company::select('company.id','company.name')->get();
        $companys = json_decode(json_encode($companys), true);
        //dd($solicitudedit);
        return view('request.edit',[
            'solicitudedit' =>$solicitudedit,
            'companys' =>$companys
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
        $solicitud = Solicitudes::find($id);
        $solicitud->name = $request->get('nombre');
        $solicitud->identificacion = $request->get('identificacion');
        $solicitud->valuerequest = $request->get('ValorSolicitud');
        $solicitud->age = $request->get('edad');
        $solicitud->address = $request->get('direccion');
        $solicitud->idcompany = $request->get('selectCompany');
        if($solicitud->save()){
            $msg = "Registro Actualizado Correctamente";
        }else{
            $msg = "Registro No Actualizado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'/requests'
        ]);

        //return redirect('/requests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmdestroy($id)
    {

        
        return view('confirm',[
            'mensaje' =>'Esta seguro que quiere eliminar el registro',
            'can' =>'/requests',
            'ok' =>'/requests/destroy/'.$id,

        ]);

    }
 

    public function destroy($id)
    {

        $solicitud = Solicitudes::find($id);
        $solicitud->delete();

        if($solicitud->delete()){
            $msg = "Registro No Eliminado Correctamente";
        }else{
            $msg = "Registro Eliminado Correctamente";
        }

        return view('alertas',[
            'mensaje' =>$msg,
            'pag' =>'/requests'
        ]);

    }
}
