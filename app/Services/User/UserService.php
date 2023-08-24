<?php

namespace App\Services\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Repositories\User\UserInterface;

class UserService
{
  public function __construct(private UserInterface $repository)
  {
  }

  public function index()
  {
    // $results = Cache::remember('users:list', now()->addMinutes(5), function () {
    //   return $this->repository->index();
    // });
    // return $results;
  }

  public function store(array $data)
  {
    $attributes = [
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ];
    return $this->repository->store($attributes);
  }

  public function show($id)
  {
    // $result = Cache::remember('users:' . $id, now()->addMinutes(5), function () use ($id) {
    //   return $this->repository->show($id);
    // });
    // return $result;
  }

  public function update($id, array $data)
  {
    // Cache::forget('users:list');
    // Cache::forget('users:' . $id);
    // $attributes = [
    //   'name' => $name = Str::upper($data['name']),
    //   'slug' => Str::slug($name)
    // ];
    // return $this->repository->update($id, $attributes);
  }

  public function destroy($id)
  {
    // Cache::forget('users:list');
    // Cache::forget('users:' . $id);
    // $this->repository->destroy($id);
  }
}
