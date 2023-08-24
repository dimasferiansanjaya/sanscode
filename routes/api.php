<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\Department\DepartmentController;

// Auth Section
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  // Other authenticated routes
  Route::delete('/auth/logout', [AuthController::class, 'logout']);

  // Employee Section
  Route::get('/employees', [EmployeeController::class, 'index']);
  Route::post('/employees', [EmployeeController::class, 'addNewEmployee']);
  Route::get('/employees/{id}', [EmployeeController::class, 'getEmployeeById']);
  Route::patch('/employees/{id}/restore', [EmployeeController::class, 'restore']);
  Route::put('/employees/{id}', [EmployeeController::class, 'updateEmployee']);
  Route::delete('/employees/{id}', [EmployeeController::class, 'deleteEmployee']);
  Route::delete('/employees', [EmployeeController::class, 'deleteAllEmployees']);

  // Department Section
  Route::get('/departments', [DepartmentController::class, 'index']);
  Route::post('/departments', [DepartmentController::class, 'store']);
  Route::get('/departments/{slug}', [DepartmentController::class, 'show']);
  Route::put('/departments/{slug}', [DepartmentController::class, 'update']);
  Route::delete('/departments/{slug}', [DepartmentController::class, 'destroy']);
  Route::get('/departments/{slug}/employees', [DepartmentController::class, 'list']);
});
