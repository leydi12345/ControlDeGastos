<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Gastovariable;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GastovariableFormRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

use Carbon\Carbon;
use Response;

class GastovariableController extends Controller
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
                $variables=DB::table('gasto_variable')->where('otros','LIKE','%'.$query.'%')
                ->where ('condicion','=','1')
                ->orderBy('idgasto_variable','desc')
                ->paginate(7);


                $variable=DB::table('gasto_variable as v')
                ->select('v.idgasto_variable',DB::raw('sum(v.sub_total) as total'))
                ->where ('condicion','=','1')
                ->groupBy('v.idgasto_variable')
                ->get();

                $sum=$variables->sum('sub_total');

                return view('gasto.gastovariable.index',["variables"=>$variables,"searchText"=>$query,"variable"=>$variable,"sum"=>"$sum"]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("gasto.gastovariable.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GastovariableFormRequest $request)
    {
        $variable=new Gastovariable;
        $mytime=Carbon::now('America/Caracas');
        $variable->fecha=$mytime->toDateTimeString();
        $variable->transporte=$request->get('transporte');
        $variable->alimento=$request->get('alimento');
        $variable->vestimenta=$request->get('vestimenta');
        $variable->utiles=$request->get('utiles');
        $variable->extras=$request->get('extras');
        $variable->otros=$request->get('otros');
        $variable->sub_total=$request->get('sub_total');
        $variable->condicion='1';
        $variable->save(); //almacena los datos en el modelo
        return Redirect::to('gasto/gastovariable')->with('success', 'Rol Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view("gasto.gastovariable.show",["variable"=>Gastovariable::findOrfail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("gasto.gastovariable.edit",["variable"=>Gastovariable::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GastovariableFormRequest $request,$id)
    {
        $variable=Gastovariable::findOrfail($id);
        $variable->transporte=$request->get('transporte');
        $variable->alimento=$request->get('alimento');
        $variable->vestimenta=$request->get('vestimenta'); 
        $variable->utiles=$request->get('utiles'); 
        $variable->extras=$request->get('extras'); 
        $variable->otros=$request->get('otros'); 
        $variable->sub_total=$request->get('sub_total'); 
        $variable->update();
        return Redirect::to('gasto/gastovariable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variable=Gastovariable::findOrfail($id);
        $variable->condicion='0';
        $variable->update();
        return Redirect::to('gasto/variable');
    }
}
