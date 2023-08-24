<?php

namespace App\Repositories\Department;

interface DepartmentInterface
{
  public function index();
  public function store(array $data);
  public function show($slug);
  public function update($slug, array $data);
  public function destroy($slug);

  // for list of employee
  public function list($slug);
}
