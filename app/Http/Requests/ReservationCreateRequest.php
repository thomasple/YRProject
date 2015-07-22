<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReservationCreateRequest extends Request
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
            'start' => 'required|date',
            'end' => 'required|date',
            'client_id' => 'required|exists:users,id',
            'artisan_service_id' => 'required|exists:artisans_services,id',
            'salon_id' => 'required|exists:salons,id',
        ];
    }
}
