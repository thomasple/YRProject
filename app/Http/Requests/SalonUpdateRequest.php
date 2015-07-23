<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalonUpdateRequest extends Request
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
            'name' => 'required|max:100',
            'description' => 'string',
            'address' => 'max:255|string',
            'open_hour' => 'required|date_format:H:i',
            'close_hour' => 'required|date_format:H:i',
            'owner_id'=>'required|exists:users,id',
            'main_photo'=>'image'
        ];
    }
}
