<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends CancionCreateRequest {
    
    public function rules()
    {
        $rules = parent::rules();
        $rules['email'] = 'required|string|min:1|max:100|unique:poster,email';
        $rules['birthdate'] = 'required|date';
        return $rules;
    }
}