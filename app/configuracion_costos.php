<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class configuracion_costos extends Model
{
    protected $table='configuracion_costos';

    protected $primaryKey="cod_configuracion";

    public $timestamps=false;


    protected $fillable=['precio_cuero','precio_suela','precio_pegamento','precio_textile','precio_plancha','precio_horma','precio_troquel','precio_accesorio','cod_empresa'];

    protected $guarded=[];
}
