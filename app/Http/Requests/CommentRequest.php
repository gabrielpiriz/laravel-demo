<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//Validar información que se envia del comentario que se quiere insertar
class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check(); //usuario logueado?
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|max:5000', //contenido del textbox maximo de 5000 caracteres
        ];
    }
}
