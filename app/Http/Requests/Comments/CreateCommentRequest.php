<?php

namespace App\Http\Requests\Comments;

use App\DataTransferObjects\Comments\CreateCommentData;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_id' => ['required', 'integer', 'exists:posts,id'],
            'comment' => ['required', 'string'],
        ];
    }

    public function getPostId(): int
    {
        return (int)$this->route('post_id');
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'post_id' => $this->getPostId(),
        ]);
    }

    public function getData(): CreateCommentData
    {
        return new CreateCommentData(
            postId: $this->getPostId(),
            content: $this->input('comment'),
            userId: $this->user()->getId(),
        );
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->redirector->to($this->getRedirectUrl())
            ->withErrors($validator, 'createComment')
            ->withInput());
    }
}
