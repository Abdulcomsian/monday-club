<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|numeric|min:10',
            'note' => 'nullable|string',
            'status' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name.',
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Please enter a valid email address.',
            'contact.required' => 'Please enter a contact number.',
            'contact.numeric' => 'The contact number must be a number.',
            'contact.min' => 'The contact number must be at least 10 digits long.',
            'note.string' => 'The note must be a string.',
        ];
    }
}
