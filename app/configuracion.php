<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class configuracion extends Model
{
    protected $table='configuracion';

    protected $primaryKey="cod_empresa";

    public $timestamps=false;


    protected $fillable=['nom_empresa','razon_social','RUC','tipo_contribuyente','representante_legal','nombre_comercial','domicilio','correo','telefono','celular','pagina_web'];

    protected $guarded=[];
}
