<?php

namespace App\Http\Requests\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'email' => ['required', 'string', 'email', 'max:191'],
      'password' => ['required', 'string', 'min:8'],
      'remember' => ['nullable', 'boolean']
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'Please provide the email.',
      'email.string' => 'Please provide a valid email.',
      'email.email' => 'Please provide a valid email.',
      'email.max' => 'The email must be at least :max characters long.',
      'password.required' => 'Please provide the password.',
      'password.string' => 'Please provide a valid password.',
      'password.min' => 'The password must be at least :min characters long.',
      'remember.boolean' => 'Please check remember me value.',
    ];
  }

  // Override the failedValidation method to return a JSON response
  protected function failedValidation(Validator $validator)
  {
    if ($this->expectsJson()) {
      $response = new JsonResponse([
        'status' => "error",
        'code' => 422,
        'message' => $validator->errors()->first(),
        'data' => null
      ], 422);

      throw new HttpResponseException($response);
    }

    parent::failedValidation($validator);
  }
}
