<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PersonasRequest extends FormRequest
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
            'cedula' => [
                'required',
                Rule::unique('personas')->ignore($this->id),
            ],
            'correo' => ['required', 'email', Rule::unique('personas')->ignore($this->id)],
            'nombres' => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'apellidos' => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'celular' => 'required',
            'telefono_fijo' => 'required',
            'fecha' => 'required|date',
            'rif' => 'required',
            'lugarnac' => 'required',
            'nacionalidad' => 'required',
            'urbanizacion' => 'required',
            'estado_id' => 'required|numeric',
            'ciudad_id' => 'required|numeric',
            'municipio_id' => 'required|numeric',
            'parroquia_id' => 'required|numeric',
            'tzona' => 'required',
            'nzona' => 'required',
            'tcalle' => 'required',
            'ncalle' => 'required',
            'tvivienda' => 'required',
            'nvivienda' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => (isset($this->id)) ? decrypt($this->id) : '',
            'correo' => Str::lower($this->correo),
            'nombres' => Str::upper($this->nombres),
            'apellidos' => Str::upper($this->apellidos),
            'urbanizacion' => Str::upper($this->urbanizacion),
            'nacionalidad' => Str::upper($this->nacionalidad),
            'cedula' => Str::upper($this->cedula),
            'nzona' => Str::upper($this->nzona),
            'ncalle' => Str::upper($this->ncalle),
            'nvivienda' => Str::upper($this->nvivienda),
        ]);
    }
}
