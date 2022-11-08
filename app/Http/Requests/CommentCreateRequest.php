<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreateRequest extends FormRequest
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
            
            'message' => 'Body of the comment'
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   return [
           
            'message' => 'required|string|min:0|max:255'
        ];
    }
    public function messages(){
        $required = 'This :attribute is required';
        $string = 'This :attribute requires string';
        $min = ':attribute requires a minimum of :min character';
        $max = ':attribute requires a maximum of :max characters';
        
        return [
            
            'message.required' => $required,
            'message.string' => $string,
            'message.min' => $min,
            'message.max' => $max
        ];
    }
}
