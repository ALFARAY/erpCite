<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $table='material';

  protected $primaryKey="cod_material";

  public $timestamps=false;


  protected $fillable=['descrip_material','costo_sin_igv_material','estado_material','unidad_medida_material','RUC_empresa','cod_subcategoria'];

  protected $guarded=[];
}
