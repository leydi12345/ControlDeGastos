<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingreso;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\IngresoFormRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use DB;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request)
            {
                $query=trim($request->get('searchText'));
                $ingresos=DB::table('ingreso')->where('total','LIKE','%'.$query.'%')
                ->where ('condicion','=','1')
                ->orderBy('idingreso','desc')
                ->paginate(7);
                return view('ingreso.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ingreso.ingreso.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngresoFormRequest $request)
    {
        $ingreso=new Ingreso;
        $ingreso->ingreso_fijo=$request->get('ingreso_fijo');
        $ingreso->ingreso_variable=$request->get('ingreso_variable');
        $ingreso->total=$request->get('total');
        $ingreso->condicion='1';
        $ingreso->save(); //almacena los datos en el modelo
        return Redirect::to('ingreso/ingreso')->with('success', 'Rol Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("ingreso.ingreso.show",["ingreso"=>Ingreso::findOrfail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("ingreso.ingreso.edit",["ingreso"=>Ingreso::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngresoFormRequest $request,$id)
    {
        $ingreso=Ingreso::findOrfail($id);
        $ingreso->ingreso_fijo=$request->get('ingreso_fijo');
        $ingreso->infreso_variable=$request->get('ingreso_variable');
        $ingreso->total=$request->get('total');
        $ingreso->update();
        return Redirect::to('ingreso/ingreso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso=Ingreso::findOrfail($id);
        $ingreso->condicion='0';
        $ingreso->update();
        return Redirect::to('ingreso/ingreso');
    }
}
