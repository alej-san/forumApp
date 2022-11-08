<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends CancionCreateRequest {
    
    public function rules()
    {
        $rules = parent::rules();
        $rules['title'] = 'required|string|max:100|min:2';
        $rules['message'] = 'required|string|max:255|min:2|';
        return $rules;
    }
}