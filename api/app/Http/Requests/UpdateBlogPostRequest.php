<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('update');
    }

    public function rules(): array
    {
        if ($this->method() == 'PUT') {
            return [
                'author' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'text' => ['required']
            ];
        } else {
            return [
                'author' => ['sometimes', 'required'],
                'title' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required'],
                'text' => ['sometimes', 'required']
            ];
        }
    }
}
