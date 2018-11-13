<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  protected $table='empresa';

  protected $primaryKey="RUC_empresa";

  public $timestamps=false;


  protected $fillable=['nom_empresa', 'razon_social', 'representante_legal', 'nombre_comercial', 'domicilio', 'correo', 'telefono', 'pagina_web', 'imagen','estado_empresa','cod_tipo_contribuyente','cod_regimen_laboral','cod_regimen_renta'];

  protected $guarded=[];
}
