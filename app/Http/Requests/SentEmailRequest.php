<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SentEmailRequest extends FormRequest
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
        $isUpdate = $this->isMethod('put');

        return [
            'user_id' => $isUpdate ? 'nullable|exists:users,id' : 'required|exists:users,id',
            'recipient_id' => $isUpdate ? 'nullable|exists:contacts,id' : 'required|exists:contacts,id',
            'recipient_email' => 'required|exists:contacts,email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }
}
