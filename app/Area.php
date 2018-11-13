<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table='area';

  protected $primaryKey="cod_area";

  public $timestamps=false;


  protected $fillable=['descrip_area','estado_area', 'cod_empresa'];

  protected $guarded=[];
}
