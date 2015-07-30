<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchRequest extends Request
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
            'service'=>'string|max:255',
            'salon'=>'integer',
            'last_name'=>'string|max:100',
            'first_name'=>'string|max:100',
            'sex'=>'alpha|max:1',
            'specialty'=>'string|max:255',
            'date'=>'date_format:Y-n-j',
            'beginning'=>'date_format:H:i:s',
            'end'=>'date_format:H:i:s'
        ];
    }
}
