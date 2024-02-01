<?php

namespace App\Http\Requests;

use App\Rules\ContactInfoRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:companies|max:50',
            'description' => 'required|min:100|max:255',
            'industry_field' => 'required|max:50',
            'contact_info'=> ['required', new ContactInfoRule],
            'company_img' => "required|image|mimes:jpeg,png,jpg|max:3072"
        ];
    }
}
