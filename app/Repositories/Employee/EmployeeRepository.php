<?php

namespace App\Repositories\Employee;

use App\Models\Employee;

class EmployeeRepository implements EmployeeInterface
{
  private $model;

  public function __construct(Employee $model)
  {
    $this->model = $model;
  }

  public function index()
  {
    return $this->model->paginate(15);
  }

  public function addNewEmployee(array $data)
  {
    return $this->model->create($data);
  }

  public function getEmployeeById($id)
  {
    return $this->model->query()->where('employee_id', $id)->firstOrFail();
  }

  public function updateEmployee($id, array $data)
  {
    $employee = $this->getEmployeeById($id);
    $employee->update($data);
    return $employee;
  }

  public function deleteEmployee($id)
  {
    $this->getEmployeeById($id)->delete();
  }

  public function restore($id)
  {
    $employee = $this->model->withTrashed()->where('employee_id', $id)->firstOrFail();
    $employee->restore();
    return $employee;
  }

  public function deleteAll()
  {
    $this->model->truncate();
  }
}
