<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
     protected $table='contacto';
    protected $primaryKey="idcontacto";

    public $timestamps=false;


    protected $fillable =[
     'nombre',
     'email',
     'asunto',
     'mensaje',
     'condicion'
    ];

    protected $guarded =[

    ];
}
