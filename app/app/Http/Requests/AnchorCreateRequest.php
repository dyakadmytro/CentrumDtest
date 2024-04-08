<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnchorCreateRequest extends FormRequest
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
            "title" => "nullable|string|max:64",
            "url" => "required|url:http,https|max:2048",
            "ttl" => "required|integer|min:1|max:86400",
            "max_follow" => "required|integer|min:0"
        ];
    }
}
