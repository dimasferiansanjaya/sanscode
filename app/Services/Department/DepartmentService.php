<?php

namespace App\Services\Department;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Department\DepartmentInterface;

class DepartmentService
{
  public function __construct(private DepartmentInterface $repository)
  {
  }

  public function index()
  {
    $results = Cache::remember('departments:list', now()->addMinutes(5), function () {
      return $this->repository->index();
    });
    return $results;
  }

  public function store(array $data)
  {
    Cache::forget('departments:list');
    $attributes = [
      'name' => $name = Str::upper($data['name']),
      'slug' => Str::slug($name)
    ];
    return $this->repository->store($attributes);
  }

  public function show($slug)
  {
    $result = Cache::remember('departments:' . $slug, now()->addMinutes(5), function () use ($slug) {
      return $this->repository->show($slug);
    });
    return $result;
  }

  public function update($slug, array $data)
  {
    Cache::forget('departments:list');
    Cache::forget('departments:' . $slug);
    $attributes = [
      'name' => $name = Str::upper($data['name']),
      'slug' => Str::slug($name)
    ];
    return $this->repository->update($slug, $attributes);
  }

  public function destroy($slug)
  {
    Cache::forget('departments:list');
    Cache::forget('departments:' . $slug);
    $this->repository->destroy($slug);
  }

  public function list($slug)
  {
    return $this->repository->list($slug);
  }
}
