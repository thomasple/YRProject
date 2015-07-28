<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalonCreationRequest extends Request
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
            'user_id' => 'required|exists:users,id',
            'city' => 'required|max:100',
            'address' => 'required|max:255',
        ];
    }
}
