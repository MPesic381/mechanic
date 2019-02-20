<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
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
            'year' => 'required|integer|between:1901,' . Carbon::now()->year,
            'kilometrage' => 'required|integer|between:1,999999',
            'hp' => 'required|integer|between:1,999',
            'cc' => 'required|integer|between:49,7000'
        ];
    }
}
