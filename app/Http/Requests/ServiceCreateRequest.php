<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServiceCreateRequest extends Request
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
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'salon_id' => 'required|exists:salons,id',
        ];
    }
}
