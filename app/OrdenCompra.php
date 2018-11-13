<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
  protected $table='orden_compra';

  protected $primaryKey="cod_orden_compra";

  public $timestamps=false;


  protected $fillable=['costo_total_oc','comentario_oc','RUC_empresa','fecha_orden_compra','estado_orden_compra'];

  protected $guarded=[];
}
