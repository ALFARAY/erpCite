<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class KardexDetalle extends Model
{
  protected $table='detalle_kardex_material';

   protected $primaryKey='cod_kardex_material';

   public $timestamps=false;

   protected $fillable=['fecha_ingreso','fecha_salida','fecha_devolucion','stock','cantidad_ingresada','cantidad_salida','trasladador_material'];

   protected $guarded=[];
}
