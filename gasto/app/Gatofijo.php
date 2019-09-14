<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gatofijo extends Model
{
    protected $table='gasto_fijo';
    protected $primaryKey="idgasto_fijo";

    public $timestamps=false;


    protected $fillable =[
     'luz',
     'cable',
     'agua',
     'hipoteca',
     'alquiler',
     'sub_total',
     'otros',
     'condicion'
    ];

    protected $guarded =[

    ];
}
