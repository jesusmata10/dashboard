<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserCreateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'cedula' => [
                'numeric',
                'required',
                Rule::unique('personas')->ignore($this->id),
            ],
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore($this->id),
            ],
            'primer_nombre' => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'segundo_nombre' => 'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'primer_apellido' => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'segundo_apellido' => 'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'celular' => 'required',
            'fecha' => 'required',
            'nacionalidad' => 'required',
            'estado_id' => 'required|numeric',
            'ciudad_id' => 'required|numeric',
            'municipio_id' => 'required|numeric',
            'parroquia_id' => 'required|numeric',
            'urbanizacion' => 'required',
            'tzona' => 'required',
            'nzona' => 'required',
            'tcalle' => 'required',
            'ncalle' => 'required',
            'tvivienda' => 'required',
            'nvivienda' => 'required',
            'name' => [
                'required',
                'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ]+$/',
                'between:6,50',
            ],
            'rol' => 'required',
            'password' => 'required|string|between:6,10',
            'password_confirmation' => 'required|string|between:6,10',
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
            'urbanizacion' => Str::upper($this->urbanizacion),
            'nacionalidad' => Str::upper($this->nacionalidad),
            'cedula' => Str::upper($this->cedula),
            'nzona' => Str::upper($this->nzona),
            'ncalle' => Str::upper($this->ncalle),
            'nvivienda' => Str::upper($this->nvivienda),
            'lugarnac' => Str::upper($this->lugarnac),
            'name' => Str::lower($this->name),
        ]);
    }

    public function messages()
    {
        return [
            'primer_nombre.regex' => 'Sólo debe contener letras.',
            'segundo_nombre.regex' => 'Sólo debe contener letras.',
            'primer_apellido.regex' => 'Sólo debe contener letras.',
            'segundo_apellido.regex' => 'Sólo debe contener letras.',
            'name.regex' => 'Sólo debe contener letras.',
        ];
    }

}

