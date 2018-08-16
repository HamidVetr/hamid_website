<?php

namespace App\Http\Requests\VisitorRequests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMeRequest extends FormRequest
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
            'email'   => 'required|email|max:191',
            'subject' => 'required|max:191',
            'message' => 'required',
        ];
    }
}
