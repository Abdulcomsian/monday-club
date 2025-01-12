<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'video_file' => $isUpdate ? 'nullable|file|mimes:mp4,avi,mov,mkv|max:20480' : 'required|file|mimes:mp4,avi,mov,mkv|max:20480',
            'description' => 'nullable|string'
        ];
    }
}
