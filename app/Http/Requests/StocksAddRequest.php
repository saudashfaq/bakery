<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StocksAddRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
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

                'items' => 'required',
                'price' => 'required',
                'unit_id' => 'required',
                'quantity' => 'required',


        ];
    }
}
