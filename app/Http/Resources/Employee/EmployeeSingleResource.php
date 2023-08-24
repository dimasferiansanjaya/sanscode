<?php

namespace App\Http\Resources\Employee;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeSingleResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'department_id' => $this->department_id,
      'employee_id' => $this->employee_id,
      'employee_name' => $this->employee_name,
      'hire_date' => Carbon::parse($this->hire_date)->format('d F Y'),
      'birth_date' => Carbon::parse($this->birth_date)->format('d F Y'),
      'gender' => $this->gender,
      'phone_number' => $this->phone_number,
      'picture_url' => $this->picture_url,
    ];
  }
}
