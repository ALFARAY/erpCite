<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
  protected $table='trabajador';

  protected $primaryKey="DNI_trabajador";

  public $timestamps=false;


  protected $fillable=['nombres', 'apellido_paterno', 'apellido_materno', 'direccion', 'sexo', 'fecha_nacimiento', 'puesto', 'foto','estado_trabajador', 'cod_tipo_trabajador', 'cod_area', 'RUC_empresa'];

  protected $guarded=[];
}
