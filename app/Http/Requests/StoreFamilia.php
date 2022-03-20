<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreFamilia extends FormRequest
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
            'cedula' => '',
            'correo' => ['email', Rule::unique('personas')->ignore($this->id)],
            'primer_nombre' => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'segundo_nombre' => 'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'primer_apellido' => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'segundo_apellido' => 'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            //'telefono_fijo' => 'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'fecha' => 'required|date',
            //'rif' => 'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'lugarnac' => 'required',
            'nacionalidad' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => (isset($this->id)) ? decrypt($this->id) : '',
            'correo' => Str::lower($this->correo),
            'primer_nombre' => Str::upper($this->primer_nombre),
            'segundo_nombre' => Str::upper($this->segundo_nombre),
            'primer_apellido' => Str::upper($this->primer_apellido),
            'segundo_apellido' => Str::upper($this->segundo_apellido),
            'nacionalidad' => Str::upper($this->nacionalidad),
            'cedula' => Str::upper($this->cedula),
            'lugarnac' => Str::upper($this->lugarnac)
        ]);
    }
}
