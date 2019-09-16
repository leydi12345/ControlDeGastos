<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastovariable extends Model
{
    protected $table='gasto_variable';
    protected $primaryKey="idgasto_variable";

    public $timestamps=false;


    protected $fillable =[
     'fecha',
     'transporte',
     'alimento',
     'vestimenta',
     'utiles',
     'extras',
     'otros',
     'sub_total',
     'condicion'
    ];

    protected $guarded =[

    ];
}
