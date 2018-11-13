<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class SubcategoriaModel extends Model
{
  protected $table='subcategoria';

protected $primaryKey="cod_subcategoria";

public $timestamps=false;


protected $fillable=['cod_categoria','nom_subcategoria','estado_subcategoria'];

protected $guarded=[];
}
