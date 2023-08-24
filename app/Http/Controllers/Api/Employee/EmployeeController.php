<?php

namespace App\Http\Controllers\Api\Employee;

use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use App\Traits\ExceptionHandler;
use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Resources\Employee\{EmployeeSingleResource, EmployeeCollectionResource};

class EmployeeController extends Controller
{
  use ApiResponse, ExceptionHandler;
  private $employeeService;

  public function __construct(EmployeeService $employeeService)
  {
    $this->employeeService = $employeeService;
  }

  public function index()
  {
    try {
      $data = EmployeeSingleResource::collection($this->employeeService->index());
      return $this->successWithPagination("Resources retrieved successfully.", $data, Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }

  public function getEmployeeById($id)
  {
    try {
      $data = $this->employeeService->getEmployeeById($id);
      return $this->success('Resource retrieved successfully.', new EmployeeSingleResource($data), Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }

  public function addNewEmployee(CreateEmployeeRequest $data)
  {
    try {
      $result = $this->employeeService->addNewEmployee($data->validated());
      return $this->success("Resource created successfully.", new EmployeeSingleResource($result), Response::HTTP_CREATED);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }

  public function updateEmployee(UpdateEmployeeRequest $data, $id)
  {
    try {
      $result = $this->employeeService->updateEmployee($id, $data->validated());
      return $this->success("Resource updated successfully.", new EmployeeSingleResource($result), Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }

  public function deleteEmployee($id)
  {
    try {
      $this->employeeService->deleteEmployee($id);
      return $this->success("Resource deleted successfully.", null, Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }

  public function deleteAllEmployees()
  {
    try {
      $this->employeeService->deleteAll();
      return $this->success("Resources deleted successfully.", null, Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }

  public function restore($id)
  {
    try {
      $result = $this->employeeService->restore($id);
      return $this->success('Resource restored successfully.', new EmployeeSingleResource($result), Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }
}
