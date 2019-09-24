<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contacto;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactoFormRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ContactoController extends Controller
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
                $contactos=DB::table('contacto')->where('nombre','LIKE','%'.$query.'%')
                ->where ('condicion','=','1')
                ->orderBy('idcontacto','desc')
                ->paginate(7);
                return view('contacto.index',["contactos"=>$contactos,"searchText"=>$query]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contacto.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoFormRequest $request)
    {
        $contacto=new Contacto;
        $contacto->nombre=$request->get('nombre');
        $contacto->email=$request->get('email');
        $contacto->asunto=$request->get('asunto');
        $contacto->mensaje=$request->get('mensaje');
        $contacto->condicion='1';
        $contacto->save(); //almacena los datos en el modelo



       Mail::to('morales@gmail.com')->send(new MessageReceived($contacto));

       return new MessageReceived($contacto);

        return Redirect::to('contacto')->with('success', 'Mensaje Enviado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("contacto.show",["contacto"=>Contacto::findOrfail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("contacto.edit",["contacto"=>Contacto::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactoFormRequest $request,$id)
    {
        $contacto=Contacto::findOrfail($id);
        $contacto->nombre=$request->get('nombre');
        $contacto->email=$request->get('email');
        $contacto->asunto=$request->get('asunto');
        $contacto->mensaje=$request->get('mensaje'); 
        $contacto->update();
        return Redirect::to('contacto')->with('success', 'Distrito Modificado Correctamente');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $contacto=Contacto::findOrfail($id);
        $contacto->condicion='0';
        $contacto->update();
        return Redirect::to('categoria/distrito');
    }
}
