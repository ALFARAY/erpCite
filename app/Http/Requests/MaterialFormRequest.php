<?php

namespace erpCite\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MaterialFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombre_material'=>'required|max:50',
          'descripcion_material'=>'required|max:50',
          'costo_sin_igv'=>'required',
          'unidad_medida'=>'required|max:6',
          'cod_clasificacion'=>'required|max:3',
          'cod_empresa'=>'required|max:5',
        ];
    }
}
