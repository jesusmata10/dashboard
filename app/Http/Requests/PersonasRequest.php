<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'correo'       => [
                'email',
                'required',
                //Rule::unique('public.personas')->ignore($this->id)
            ],
            'nombres'      => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'apellidos'    => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'celular'      => 'required!unique',
            'fecha'        => 'required|date',
            'correo'       => 'required|between:10,250',
            'lugarnac'     => 'required',
            'nacionalidad' => 'required',
            'urbanizacion' => 'required',
            'estado_id'    => 'required|numeric',
            'ciudad_id'    => 'required|numeric',
            'municipio_id' => 'required|numeric',
            'parroquia_id' => 'required|numeric',
            'parroquia_id' => 'required',
            'tzona'        => 'required',
            'nzona'        => 'required',
            'tcalle'       => 'required',
            'ncalle'       => 'required',
            'tvivienda'    => 'required',
            'nvivienda'    => 'required',

            /*'name'                 => [
        'required',
        'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ]+$/',
        'between:6,50',
        Rule::unique('seguridad.users')->ignore($this->id),
        ],*/
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'correo'       => Str::lower($this->correo),
            'nombres'      => Str::upper($this->nombres),
            'apellidos'    => Str::upper($this->apellidos),
            'urbanizacion' => Str::upper($this->urbanizacion),
            'nacionalidad' => Str::upper($this->nacionalidad),
            'cedula'       => Str::upper($this->cedula),
        ]);
    }
}
