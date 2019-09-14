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
                return view('gasto.gastofijo.index',["gastos"=>$gastos,"searchText"=>$query]);
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
    public function store(GrastofijoFormRequest $request)
    {
        $gasto=new Gatofijo;
        $gasto->luz=$request->get('luz');
        $gasto->cable=$request->get('cable');
        $gasto->agua=$request->get('agua');
        $gasto->hipoteca=$request->get('hipoteca');
        $gasto->alquiler=$request->get('alquiler');
        $gasto->otros=$request->get('otros');
        $gasto->sub_total=$request->get('sub_total');
        $gasto->condicion='1';
        $gasto->save(); //almacena los datos en el modelo
        return Redirect::to('gasto/gastofijo')->with('success', 'Rol Guardado');
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

