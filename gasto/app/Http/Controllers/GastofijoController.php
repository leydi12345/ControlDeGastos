<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gatofijo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GrastofijoFormRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

use Carbon\Carbon;
use Response;


class GastofijoController extends Controller
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
                $gastos=DB::table('gasto_fijo')->where('luz','LIKE','%'.$query.'%')
                ->where ('condicion','=','1')
                ->orderBy('idgasto_fijo','desc')
                ->paginate(7);
               

                $gasto=DB::table('gasto_fijo as g')
                ->select('g.idgasto_fijo',DB::raw('sum(g.sub_total) as total'))
                ->where ('condicion','=','1')
                ->groupBy('g.idgasto_fijo')
                ->get();

                $sum=$gastos->sum('sub_total');

                 return view('gasto.gastofijo.index',["gastos"=>$gastos,"searchText"=>$query,"gasto"=>$gasto,"sum"=>"$sum"]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("gasto.gastofijo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   


    public function store (GrastofijoFormRequest $request)
    {

        try{
            DB::beginTransaction();


            $luz = $request->get('luz');
            $cable = $request->get('cable');
            $agua = $request->get('agua');
            $hipoteca = $request->get('hipoteca');
            $alquiler = $request->get('alquiler');
            $otros = $request->get('otros');
            $subtotal = $request->get('subtotals');
            


            $cont = 0;

            while ($cont < count($alquiler)) {
                $gasto = new Gatofijo();
                $mytime = Carbon::now('America/Caracas');
                $gasto->fecha=$mytime->toDateTimeString();
                $gasto->luz= $luz[$cont];
                $gasto->cable= $cable[$cont];
                $gasto->agua= $agua[$cont];
                $gasto->hipoteca= $hipoteca[$cont];
                $gasto->alquiler= $alquiler[$cont];
                $gasto->otros= $otros[$cont];
                $gasto->sub_total= $subtotal[$cont];
                $gasto->condicion=1;
                $gasto->save();
                $cont=$cont+1;
                
                //$cont=$cont+1;
            }

            DB::commit();

        }
        catch(Exception $e)
        {
            DB::rollback();
        }

        return Redirect::to('gasto/gastofijo')->with('success', 'Ingreso Guardado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("gasto.gastofijo.show",["gasto"=>Gatofijo::findOrfail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("gasto.gastofijo.edit",["gasto"=>Gatofijo::findOrfail($id)]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrastofijoFormRequest $request,$id)
    {
        $gasto=Gatofijo::findOrfail($id);
        $gasto->luz=$request->get('luz');
        $gasto->cable=$request->get('cable');
        $gasto->agua=$request->get('agua'); 
        $gasto->hipoteca=$request->get('hipoteca'); 
        $gasto->alquiler=$request->get('alquiler'); 
        $gasto->otros=$request->get('otros'); 
        $gasto->sub_total=$request->get('sub_total'); 
        $gasto->update();
        return Redirect::to('gasto/gastofijo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gasto=Gatofijo::findOrfail($id);
        $gasto->condicion='0';
        $gasto->update();
        return Redirect::to('gasto/gastofijo');
    }
    }

