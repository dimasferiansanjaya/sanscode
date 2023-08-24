<?php

namespace App\Http\Controllers\Api\Department;

use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use App\Traits\ExceptionHandler;
use App\Http\Controllers\Controller;
use App\Services\Department\DepartmentService;
use App\Http\Requests\Department\DepartmentRequest;
use App\Http\Resources\Employee\EmployeeSingleResource;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Http\Resources\Department\DepartmentSingleResource;

class DepartmentController extends Controller
{
  use ApiResponse, ExceptionHandler;

  public function __construct(private DepartmentService $service)
  {
  }

  public function index()
  {
    try {
      $data = DepartmentSingleResource::collection($this->service->index());
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }

    return $this->success('Resources retrieved successfully.', $data, Response::HTTP_OK);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(DepartmentRequest $request)
  {
    try {
      $data = DepartmentSingleResource::make($this->service->store($request->validated()));
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }

    return $this->success('Resource created successfully.', $data, Response::HTTP_CREATED);
  }

  /**
   * Display the specified resource.
   */
  public function show($slug)
  {
    try {
      $data = DepartmentSingleResource::make($this->service->show($slug));
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }

    return $this->success('Resource retrieved successfully.', $data, Response::HTTP_OK);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDepartmentRequest $request, $slug)
  {
    try {
      $data = DepartmentSingleResource::make($this->service->update($slug, $request->validated()));
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }

    return $this->success('Resource updated successfully.', $data, Response::HTTP_OK);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($slug)
  {
    try {
      $data = $this->service->destroy($slug);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }

    return $this->success('Resource deleted successfully.', $data, Response::HTTP_OK);
  }

  public function list($slug)
  {
    try {
      $data = EmployeeSingleResource::collection($this->service->list($slug));
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }

    return $this->success('Resources retrieved successfully.', $data, Response::HTTP_OK);
  }
}
