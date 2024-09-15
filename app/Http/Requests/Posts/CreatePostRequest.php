<?php

namespace App\Http\Requests\Posts;

use App\DataTransferObjects\Posts\CreatePostData;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'content' => ['required', 'string'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
        ];
    }

    public function getData(): CreatePostData
    {
        return new CreatePostData(
            title: $this->input('title'),
            content: $this->input('content'),
            userId: $this->user()->getId(),
            categoryIds: $this->input('categories'),
        );
    }
}
