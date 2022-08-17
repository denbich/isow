<?php

namespace App\Http\Requests;

use App\Models\Form_category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class FormCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $categoryid = $this->route('category');
        // dd(Form_category::where('ivid', $categoryid)->firstOrFail());
        // return Gate::allows('update-form-category', Form_category::where('ivid', $categoryid)->firstOrFail());
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
            'icon' => 'required|max:255',
            'color' => 'required|max:255',
        ];
    }
}
