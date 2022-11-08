<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosterCreateRequest extends FormRequest
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
    function attributes(){
        return [
            'username' => 'Name of the user',
            'email' => 'email of the user',
            'birthdate' => 'Date of birth of the user'
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   return [
            'username' => 'required|string|min:1|max:20|unique:poster,username',
            'email' => 'required|string|min:1|max:100|unique:poster,email',
            'birthdate' => 'required|date'
        ];
    }
    public function messages(){
        $required = 'This :attribute is required';
        $string = 'This :attribute requires string';
        $min = ':attribute requires a minimum of :min characters';
        $max = ':attribute requires a maximum of :max characters';
        
        return [
            
            'username.required' => $required,
            'username.string' => $string,
            'username.min' => $min,
            'username.max' => $max,
            'username.unique' => 'User is already in the database',
            'email.required' => $required,
            'email.string' => $string,
            'email.min' => $min,
            'email.max' => $max,
            'duracion.date_format' => 'The :attribute needs to be hh:mm:ss',
            'birthdate.required' => $required,
            'birthdate.date' => 'The :attribute needs to be dd/mm/yyyy'
        ];
    }
}