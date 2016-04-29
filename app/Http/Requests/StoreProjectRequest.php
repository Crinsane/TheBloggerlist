<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProjectRequest extends Request
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
            'title' => 'required|max:255',
            'description' => 'required',
            'start_at' => 'required|date|before:end_at',
            'end_at' => 'required|date|after:start_at'
        ];
    }
}
