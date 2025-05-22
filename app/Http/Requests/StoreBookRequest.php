<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' =>'required|string|max:100', 
            'content' =>'required|file|mimes:pdf|max:10240',
            'cover' =>'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'genre_id' =>'required|exists:genres,id',
            'autor_id' =>'required|exists:autors,id',
        ];
    }
}
