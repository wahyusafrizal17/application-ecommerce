<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name_card'               => 'required',
            'number_card'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_card.required'               => 'Nama rekening tidak boleh kosong',
            'number_card.required'             => 'Nomor rekening tidak boleh kosong',
        ];
    }
}
