<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TorihikisakiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'torihiki_cd' => 'required',//取引先コード
            'client_name' => 'nullable',//取引先名
            'client_name_kana' => 'nullable',//取引先名（カナ）
            'department_name' => 'nullable',//部署名
            'postal_cd' => 'nullable',//郵便番号
            'address1' => 'nullable',//住所1
            'address2' => 'nullable',//住所2
            'main_phone_number' => 'nullable',//電話番号
        ];
    }
}
