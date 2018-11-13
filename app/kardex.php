<?php

namespace erpCite;

use Illuminate\Database\Eloquent\Model;

class kardex extends Model
{
   protected $table='kardex_material';

    protected $primaryKey='cod_kardex_material';

    public $timestamps=false;

    protected $fillable=['cod_almacen','cod_material','RUC_empresa','stock_minimo','stock_maximo','lugar_almacenaje','stock_total'];

    protected $guarded=[];
}
