<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' =>'sometimes|string|max:100', 
            'content' =>'sometimes|file|mimes:pdf|max:10240',
            'cover' =>'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048',
            'genre_id' =>'sometimes|exists:genres,id',
            'autor_id' =>'sometimes|exists:autors,id',
        ];
    }
}
