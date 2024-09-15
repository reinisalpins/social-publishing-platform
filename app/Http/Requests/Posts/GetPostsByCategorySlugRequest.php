<?php

namespace App\Http\Requests\Posts;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetPostsByCategorySlugRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'slug' => [
                'required',
                'string',
                'exists:categories,slug',
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->getSlug()
        ]);
    }

    public function getSlug(): string
    {
        return (string)$this->route('slug');
    }

    protected function failedValidation(Validator $validator): NotFoundHttpException
    {
        throw new NotFoundHttpException();
    }
}
