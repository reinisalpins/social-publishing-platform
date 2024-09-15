<?php

namespace App\Http\Requests\Profile;

use App\DataTransferObjects\User\UpdateUserPasswordData;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdatePasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function getData(): UpdateUserPasswordData
    {
        return new UpdateUserPasswordData(
            user: $this->user(),
            password: $this->input('current_password')
        );
    }

    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->redirector->to($this->getRedirectUrl())
            ->withErrors($validator, 'passwordUpdate')
            ->withInput());
    }
}
