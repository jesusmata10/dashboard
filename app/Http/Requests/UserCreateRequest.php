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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cedula'               => [
                'numeric',
                'required',
                Rule::unique('personas')->ignore($this->id),
            ],
            'correo'                => [
                'email',
                'required',
                Rule::unique('users')->ignore($this->id),
            ],
            'nombres'              => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'apellidos'            => 'required|regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ\s]+$/|between:2,50',
            'telefono_local'       => 'required',
            'telefono_movil'       => 'required',
            'direccion_habitacion' => 'required|between:10,250',
            'direccion_trabajo'    => 'required|between:10,250',
            'estado_id' => 'required',
            //'municipio_id' => '',
            //'parroquia_id' => '',
            //'urbanizacion' => '',
            'tzona' => 'required',
            'nzona' => 'required',
            'tcalle' => 'required',
            'ncalle' => 'required',
            'tvivienda' => 'required',
            'nvivienda' => 'required',
            'name'                 => [
                'required',
                'regex:/^[A-Za-záéíóúñÁÉÍÓÚÑ]+$/',
                'between:6,50',
                Rule::unique('users')->ignore($this->id),
            ],
            //'rol'                  => 'required',
            'password'             => 'required|string|between:6,10',
            'confirm_password'     => 'required|string|between:6,10',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'id'                   => (isset($this->id)) ? decrypt($this->id) : '',
            'email'                => Str::lower($this->email),
            'nombres'              => Str::upper($this->nombres),
            'apellidos'            => Str::upper($this->apellidos),
            'name'                 => Str::lower($this->name),
        ]);
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombres.regex'   => 'Sólo debe contener letras.',
            'apellidos.regex' => 'Sólo debe contener letras.',
            'name.regex'      => 'Sólo debe contener letras.',
        ];
    }


}
