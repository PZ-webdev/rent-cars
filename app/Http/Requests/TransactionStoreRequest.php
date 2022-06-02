<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_user'            => 'required|numeric',
            'id_car'             => 'required|numeric',
            'date_start'         => 'required|date|after:today',
            'date_end'           => 'required|date|after_or_equal:date_start',
            'refundable_deposit' => 'required|numeric',
        ];
    }
}
