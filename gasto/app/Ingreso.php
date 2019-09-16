<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
     protected $table='ingreso';
    protected $primaryKey="idingreso";

    public $timestamps=false;


    protected $fillable =[
    'fecha',
     'ingreso_fijo',
     'ingreso_variable',
     'total',
     'condicion'
    ];

    protected $guarded =[

    ];
}
