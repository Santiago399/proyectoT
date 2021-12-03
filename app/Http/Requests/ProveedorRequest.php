<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:50|regex:/^[A-Zz][A-Z,a-z, ,á,é,í,ó,ü]+$/',
            'apellido' => 'required|min:3|max:50|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü]+$/',
            'celular' =>'required|min:7|max:10|unique:proveedores',
            'correo' => 'required|email|regex:/^[a-z,A-Z,0-9]+@[a-z,A-Z,0-9]+[.][a-zA-Z0-9-]+$/|unique:proveedores',
            'estado' =>'required',
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.min' => 'El mínimo permitido son 3 caracteres',
            'nombre.max' => 'El máximo permitido son 12 caracteres',
            'nombre.regex' => 'La primera letra debe de estar en mayuscula',
            'apellido.required' => 'El campo apellido es requerido',
            'apellido.min' => 'El mínimo permitido son 3 caracteres',
            'apellido.max' => 'El máximo permitido son 12 caracteres',
            'apellido.regex' => 'La primera letra debe de estar en mayuscula',
            'correo.required' => 'El campo correo es requerido',
            'correo.email' => 'El formato de email es incorrecto',
            'celular.required' => 'El campo celulares requerido',
            'celular.min' => 'El mínimo permitido son 7 numeros',
            'celular.max' => 'El máximo permitido son 10 numeros',
        ];
    }
    public function response(array $errors){
        if ($this->ajax()){
            return response()->json($errors, 200);
        }
        else
        {
        return redirect($this->redirect)
                ->withErrors($errors, 'proveedores')
                ->withInput();
        }
    }
}
 