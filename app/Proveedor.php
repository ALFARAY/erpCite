<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';

  protected $primaryKey="RUC_proveedor";

  public $timestamps=false;


  protected $fillable=['nom_proveedor','direc_proveedor','direc_tienda','telefono_proveedor','cel_proveedor','correo_proveedor','estado_proveedor','RUC_empresa','cod_tipo_proveedor'];

  protected $guarded=[];
}
