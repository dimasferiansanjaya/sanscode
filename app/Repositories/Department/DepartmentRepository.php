<?php

namespace App\Repositories\Department;

use App\Models\Department;

class DepartmentRepository implements DepartmentInterface
{
  public function __construct(private Department $model)
  {
  }

  public function index()
  {
    return $this->model->paginate(15);
  }

  public function store(array $data)
  {
    return $this->model->create($data);
  }

  public function show($slug)
  {
    return $this->model->query()->whereSlug($slug)->firstOrFail();
  }

  public function update($slug, array $data)
  {
    $department = $this->show($slug);
    $department->update($data);
    return $department;
  }

  public function destroy($slug)
  {
    $this->show($slug)->delete();
  }

  public function list($slug)
  {
    return $this->model->query()->with('employees')->whereSlug($slug)->firstOrFail()->employees;
  }
}
