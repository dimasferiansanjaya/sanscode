<?php

namespace App\Http\Requests\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'name' => ['required', 'string', 'min:3', 'max:191'],
      'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
      'password' => ['required', 'string', 'min:8'],
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Please provide the name.',
      'name.string' => 'Please provide a valid name.',
      'name.min' => 'The name must be at least :min characters long.',
      'name.max' => 'The name must be at least :max characters long.',
      'email.required' => 'Please provide the email.',
      'email.string' => 'Please provide a valid email.',
      'email.email' => 'Please provide a valid email.',
      'email.max' => 'The email must be at least :max characters long.',
      'email.unique' => 'An identity with the same email address already exists.',
      'password.required' => 'Please provide the password.',
      'password.string' => 'Please provide a valid password.',
      'password.min' => 'The password must be at least :min characters long.',
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
