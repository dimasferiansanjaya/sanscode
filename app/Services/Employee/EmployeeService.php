<?php

namespace App\Services\Employee;

use App\Repositories\Employee\EmployeeInterface;

class EmployeeService
{
  private $employeeRepository;

  public function __construct(EmployeeInterface $employeeRepository)
  {
    $this->employeeRepository = $employeeRepository;
  }

  public function index()
  {
    return $this->employeeRepository->index();
  }

  public function addNewEmployee(array $data)
  {
    return $this->employeeRepository->addNewEmployee($data);
  }

  public function getEmployeeById($id)
  {
    return $this->employeeRepository->getEmployeeById($id);
  }

  public function updateEmployee($id, array $data)
  {
    return $this->employeeRepository->updateEmployee($id,  $data);
  }

  public function deleteEmployee($id)
  {
    $this->employeeRepository->deleteEmployee($id);
  }

  public function restore($id)
  {
    return $this->employeeRepository->restore($id);
  }

  public function deleteAll()
  {
    $this->employeeRepository->deleteAll();
  }
}
