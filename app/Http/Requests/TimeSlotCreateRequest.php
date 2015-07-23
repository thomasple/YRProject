<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TimeSlotCreateRequest extends Request
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
            'day' => 'required|alpha|max:2',
            'from_hour' => 'required|dateformat:H:i:s',
            'to_hour' => 'required|dateformat:H:i:s',
            'service_id' => 'required|Integer|max:10',
            'artisan_id' => 'required|Integer|max:10',
        ];
    }
}
