<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CarnetCreateRequest extends FormRequest
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
            'cedula' => 'required',
            'serial' => [
                'required',
                Rule::unique('carnet')->ignore($this->id),
            ],
            'codigo' => [
                'required',
                Rule::unique('carnet')->ignore($this->id),
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => (isset($this->id)) ? decrypt($this->id) : '',
            'cedula' => Str::upper($this->cedula),

        ]);
    }
}
