<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'plate' => 'required|min:3|max:10',
            'manufacturer' => 'required|max:30',
            'model' => 'required|max:30',
            'year' => 'required|integer|between:1980,2019|',
            'kilometrage' => 'required|integer|between:1,500000',
            'hp' => 'required|integer|between:10,999',
            'cc' => 'required|integer|between:50,7000'
        ];
    }
}
