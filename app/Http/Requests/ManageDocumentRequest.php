<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageDocumentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'document' => $isUpdate ? 'nullable|file|mimes:pdf,doc,docx|max:2048' : 'required|file|mimes:pdf,doc,docx|max:2048',
            'description' => 'nullable|string'
        ];
    }
}
