<?php

namespace App\Http\Requests\Posts;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SearchPostsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'term' => ['required', 'string', 'max:255']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'term' => $this->getTerm()
        ]);
    }

    public function getTerm(): string
    {
        return $this->string('term')
            ->trim()
            ->stripTags()
            ->value();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}
