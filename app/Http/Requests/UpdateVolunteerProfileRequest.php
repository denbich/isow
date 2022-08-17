<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVolunteerProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user()->id,
            'telephone' => 'required|max:255',
            'school' => 'required|string|max:255',
            'ice' => 'required|max:255',
            'street' => 'required|string|max:255',
            'house_number' =>'required|string|max:255',
            'city' =>'required|string|max:255',
            'tshirt_size' => 'required',
        ];
    }
}
