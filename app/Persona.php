<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';
    protected $primaryKey='id_persona';
    public $timestamps='';

    protected $fillable=[
        'nombre',
        'ap_paterno',
        'ap_materno',
        'nacionalidad',
        'foto'
    ];
}
