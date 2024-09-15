<?php

declare(strict_types=1);

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class DeletePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_id' => [
                'required',
                'integer',
                'exists:posts,id',
            ]
        ];
    }

    public function getPostId(): int
    {
        return (int)$this->route('post_id');
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'post_id' => $this->getPostId(),
        ]);
    }
}
