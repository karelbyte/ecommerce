<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre completo es requerido.',
            'name.string' => 'El nombre tiene que ser válido.',
            'names.max' => 'La logitud maxima es de 190 caracteres.',
            'email.required' => 'El correo electronico es requerido.',
            'email.email' => 'No es un correo válido.',
            'email.max' => 'La logitud maxima es de 190 caracteres.',
            'email.unique' => 'El correo ya esta registrado!.',
            'password.required' => 'El password es requerido.',
            'password.min' => 'La longitud minima es de 8.',
            'password.confirmed' => 'Password sin confirmar.',
        ];
    }
}
