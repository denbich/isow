<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponsorPrizeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|max:255',
            'address' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'facebook' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'required|string|max:255',
            'logo' => 'required',
        ];
    }
}
