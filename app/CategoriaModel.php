<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
  protected $table='categoria';

protected $primaryKey="cod_categoria";

public $timestamps=false;


protected $fillable=['nom_Categoria'];

protected $guarded=[];
}
