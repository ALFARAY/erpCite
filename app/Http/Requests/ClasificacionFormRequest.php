<?php

namespace erpCite\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasificacionFormRequest extends FormRequest
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
            'cod_clasificacion'=>'required|max:3',
            'categoria'=>'required|max:25',
            'subcategoria'=>'required|max:25',
            'tipo'=>'required|max:50',
            'cod_empresa'=>'required|max:5',
        ];
    }
}
