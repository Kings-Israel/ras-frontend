<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:255', 'required'],
            'last_name' => ['string', 'max:255', 'required'],
            'phone_number' => ['required', 'string', Rule::unique(User::class)->ignore($this->user()->id), new PhoneNumber],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'avatar' => ['nullable', 'mimes:png,jpg,jpeg', 'max:4096'],
            'new_password' => ['nullable', Rules\Password::defaults()],
            'old_password' => ['nullable', 'required_with:new_password'],
        ];
    }
}
