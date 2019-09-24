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

use Carbon\Carbon;
use Response;


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

                $ingreso=DB::table('ingreso as i')
                ->select('i.idingreso',DB::raw('sum(i.total) as total'))
                ->where ('condicion','=','1')
                ->groupBy('i.idingreso')
                ->get();

                $sum=$ingresos->sum('total');

                return view('ingreso.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query,"ingreso"=>$ingreso,"sum"=>"$sum"]);
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

    public function store (IngresoFormRequest $request)
    {

        try{
            DB::beginTransaction();


            $nombre = $request->get('nombre');
            $ingreso_fijo = $request->get('ingreso_fijo');
            $ingreso_variable = $request->get('ingreso_variable');
            $concepto = $request->get('concepto');
            $subtotal = $request->get('subtotals');
            


            $cont = 0;

            while ($cont < count($concepto)) {
                $ingreso = new Ingreso();
                $mytime = Carbon::now('America/Caracas');
                $ingreso->fecha=$mytime->toDateTimeString();
                $ingreso->nombre= $nombre[$cont];
                $ingreso->concepto= $concepto[$cont];
                $ingreso->ingreso_fijo= $ingreso_fijo[$cont];
                $ingreso->ingreso_variable= $ingreso_variable[$cont];
                $ingreso->total= $subtotal[$cont];
                $ingreso->condicion=1;
                $ingreso->save();
                $cont=$cont+1;
                
                //$cont=$cont+1;
            }

            DB::commit();

        }
        catch(Exception $e)
        {
            DB::rollback();
        }

        return Redirect::to('ingreso/ingreso')->with('success', 'Ingreso Guardado');

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
        $ingreso->nombre=$request->get('nombre');
        $ingreso->ingreso_fijo=$request->get('ingreso_fijo');
        $ingreso->concepto=$request->get('concepto');
        $ingreso->ingreso_variable=$request->get('ingreso_variable');
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
