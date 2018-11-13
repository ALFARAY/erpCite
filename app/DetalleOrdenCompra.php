<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class DetalleOrdenCompra extends Model
{
  protected $table='detalle_orden_compra';

  protected $primaryKey="id_detalle_oc";

  public $timestamps=false;


  protected $fillable=['RUC_proveedor','cod_orden_compra','cod_material','cantidad','costo_unitario','costo_total','unidad_medida','cod_empresa','material_recibido','pago_contado','pago_credito','fecha_pago'];

  protected $guarded=[];
}
