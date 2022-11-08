<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'Post title',
            'message' => 'Body of the post'
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   return [
            'title' => 'required|string|min:1|max:100',
            'message' => 'nullable|string|min:0|max:255'
        ];
    }
    public function messages(){
        $required = 'This :attribute is required';
        $string = 'This :attribute requires string';
        $min = ':attribute requires a minimum of :min character';
        $max = ':attribute requires a maximum of :max characters';
        
        return [
            
            'title.required' => $required,
            'title.string' => $string,
            'title.min' => $min,
            'title.max' => $max,
            'message.string' => $string,
            'message.min' => $min,
            'message.max' => $max
        ];
    }
}
