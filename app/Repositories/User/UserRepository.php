<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserInterface
{
  public function __construct(private User $model)
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

  public function show($id)
  {
    return $this->model->query()->findOrFail($id);
  }

  public function update($id, array $data)
  {
    $department = $this->show($id);
    $department->update($data);
    return $department;
  }

  public function destroy($id)
  {
    $this->show($id)->delete();
  }
}
