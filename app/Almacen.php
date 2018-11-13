<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
  protected $table='almacen';

  protected $primaryKey="cod_almacen";

  public $timestamps=false;


  protected $fillable=['descrip_almacen', 'DNI_trabajador','RUC_empresa','estado_almacen'];

  protected $guarded=[];
}
