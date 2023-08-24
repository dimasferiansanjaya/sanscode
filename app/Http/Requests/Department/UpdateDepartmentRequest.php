<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'name' => ['required', 'string', 'min:3']
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Please provide the department name.',
      'name.string' => 'Please provide a valid department name.',
      'name.min' => 'The department name must be at least :min characters long.'
    ];
  }
}
