<?php

namespace Modules\Auth\app\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Auth\app\Models\User;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['nullable', 'integer', Rule::exists(User::class,'id')],
//            'redirect' => ['required', 'url'],
//            'personal_access_client' => ['nullable', 'boolean'],
//            'password_client' => ['nullable', 'boolean'],
//            'revoked' => ['nullable', 'boolean'],
//            'secret' => ['nullable', 'string', 'max:100'],
        ];
    }
}
