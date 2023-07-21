<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductData extends FormRequest
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
            //バリデーションするカラム名追加
            'name'=>'max:30',
            'text'=>'max100',
            'amount'=>'required|intrger'
        ];
    }
}
