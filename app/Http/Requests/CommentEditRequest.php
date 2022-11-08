<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentEditRequest extends CancionCreateRequest {
    
    public function rules()
    {
        $rules = parent::rules();
        $rules['message'] = 'required|string|max:255|min:2';
        return $rules;
    }
}