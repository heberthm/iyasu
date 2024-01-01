<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormularioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
 
    public function authorize()
    {
      //esto lo cambiamos a true para poder que nos dé permiso para acceder al request
      return true;
    }
    public function rules()
    {
      return [

        'title'         => 'required|min:1|max:90',
        'cliente'       => 'required|min:1|max:80',
        'telefono'      => 'required|min:1|max:30',
        'medico'        => 'required|min:1|max:50',
      

        
                       
      ];
    }
    public function messages()
    {
      return [

        'title.required'   => 'El :attribute es obligatorio.',
        'title.min'        => 'El :attribute debe contener mas de una letra.',
        'title.max'        => 'El :attribute debe contener max 60 letras.',
 
        'cliente.required'     => 'El :attribute es obligatorio.',
        'cliente.min'          => 'El :attribute debe contener mas de una letra.',
        'cliente.max'         => 'El :attribute debe contener max 30 letras.',
 

                
      ];
    }
    public function attributes()
    {
      return [

        'title.required'   => 'El :attribute es obligatorio.',
        'title.min'        => 'El :attribute debe contener mas de una letra.',
        'title.max'        => 'El :attribute debe contener max 30 letras.',
 
        'cliente.required'   => 'El :attribute es obligatorio.',
        'cliente.min'        => 'El :attribute debe contener mas de una letra.',
        'cliente.max'        => 'El :attribute debe contener max 30 letras.',
 
               
      ];
    }
 
    }
