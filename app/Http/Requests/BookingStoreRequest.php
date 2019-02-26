<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BookingStoreRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->bookWithRegister) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'plate' => 'required|min:3|max:10|unique:cars',
                'manufacturer' => 'required|max:30',
                'model' => 'required|max:30',
                'year' => 'required|integer|between:1901,' . Carbon::now()->year,
                'kilometrage' => 'required|integer|between:1,999999',
                'hp' => 'required|integer|between:1,999',
                'cc' => 'required|integer|between:49,7000'
            ];
        } else {
            return [
                'car_id' => 'required|exists:cars,id',
                'service_id' => 'required|exists:services,id',
                'start_time' => 'required|date_format:Y-m-d H:i'
            ];
        }
    }
}
