<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkStoreRequest extends FormRequest
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
            'car_id|exists:car,id',
            'service_id' => 'required|exists:services,id',
            'kilometrage' => 'required|integer|between:1,999999',
            'serviced_at' => 'required|date_format:Y-m-d',
        ];
    }
}
