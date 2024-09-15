<?php

namespace App\Http\Requests\Posts;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowSinglePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_id' => ['required', 'integer', 'exists:posts,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'post_id' => $this->getPostId()
        ]);
    }

    public function getPostId(): int
    {
        return (int)$this->route('post_id');
    }

    protected function failedValidation(Validator $validator): NotFoundHttpException
    {
        throw new NotFoundHttpException();
    }
}
