<?php

namespace App\Repositories\Employee;

interface EmployeeInterface
{
  public function index();
  public function addNewEmployee(array $data);
  public function getEmployeeById($id);
  public function updateEmployee($id, array $data);
  public function deleteEmployee($id);
  public function restore($id);
  public function deleteAll();
}
