<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CreateEmployeeRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'department_id' => ['nullable', 'string', 'max:100'],
      'employee_id' => ['required', 'integer', 'min:4', 'unique:employees,employee_id'],
      'employee_name' => ['required', 'string', 'max:191'],
      'hire_date' => ['required', 'date'],
      'birth_date' => ['required', 'date'],
      'gender' => ['required', 'string'],
      'phone_number' => ['nullable', 'string', 'max:20'],
      'picture_url' => ['nullable', 'string', 'max:191']
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'employee_id.required' => 'Please provide the employee id.',
      'employee_id.integer' => 'Please provide a valid employee id (number).',
      'employee_id.min' => 'The employee id must be at least :min characters long.',
      'employee_id.unique' => 'An identity with the same employee id already exists.',
      'employee_name.required' => 'Please provide the employee name.',
      'employee_name.max' => 'The employee name must not be greater than :max characters long.',
      'hire_date.required' => 'Please provide the hire date.',
      'hire_date.date' => 'Please provide a valid hire date.',
      'birth_date.required' => 'Please provide the birth date.',
      'birth_date.date' => 'Please provide a valid birth date.',
      'gender.required' => 'Please select a gender.',
      'gender.string' => 'Please select a valid gender.',
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
