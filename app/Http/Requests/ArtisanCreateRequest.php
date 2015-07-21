<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArtisanCreateRequest extends Request
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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email',
            'sex' => 'required|max:1',
            'specialty' => 'required',
            'main_photo' => 'image',
            'salon_id' => 'required|exists:salons,id',
        ];
    }
}
