<?php

declare(strict_types=1);

namespace App\Http\Requests\Posts;

use App\DataTransferObjects\Posts\UpdatePostData;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_id' => ['required', 'integer', 'exists:posts,id'],
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

    public function getData(): UpdatePostData
    {
        return new UpdatePostData(
            postId: $this->getPostId(),
            title: $this->input('title'),
            content: $this->input('content'),
            categoryIds: $this->input('categories'),
        );
    }
}
