<?php

namespace App\Http\Requests\Comments;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class DeleteCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comment_id' => ['required', 'integer', 'exists:comments,id'],
        ];
    }

    public function getCommentId(): int
    {
        return (int)$this->route('comment_id');
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'comment_id' => $this->getCommentId(),
        ]);
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->redirector->to($this->getRedirectUrl())
            ->withErrors($validator)
            ->withInput());
    }
}
