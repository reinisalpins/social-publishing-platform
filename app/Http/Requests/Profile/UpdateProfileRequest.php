<?php

namespace App\Http\Requests\Profile;

use App\DataTransferObjects\User\UpdateUserData;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($this->user()->getId())
            ],
        ];
    }

    public function getData(): UpdateUserData
    {
        return new UpdateUserData(
            user: $this->user(),
            name: $this->input('name'),
            email: $this->input('email')
        );
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->redirector->to($this->getRedirectUrl())
            ->withErrors($validator, 'profileUpdate')
            ->withInput());
    }
}
