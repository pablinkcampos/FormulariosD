<?php

namespace FormulariosD\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends Request
{
    
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
           
        ];
    }/
}