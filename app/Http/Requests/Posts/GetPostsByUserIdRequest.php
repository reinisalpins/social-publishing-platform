<?php

namespace App\Http\Requests\Posts;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetPostsByUserIdRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function getUserId(): int
    {
        return (int)$this->route('user_id');
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this->getUserId(),
        ]);
    }

    protected function failedValidation(Validator $validator): NotFoundHttpException
    {
        throw new NotFoundHttpException();
    }
}
