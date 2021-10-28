<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name_card'               => 'required|unique:cards',
            'number_card'             => 'required|unique:cards',
        ];
    }

    public function messages()
    {
        return [
            'name_card.required'               => 'Nama rekening tidak boleh kosong',
            'name_card.unique'                 => 'Nama rekening tersebut sudah ada',
            'number_card.required'             => 'Nomor rekening tidak boleh kosong',
            'number_card.unique'               => 'Nomor rekening tersebut sudah ada',
        ];
    }
}
