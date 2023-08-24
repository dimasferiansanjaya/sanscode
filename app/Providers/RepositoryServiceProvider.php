<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    $this->app->singleton(\App\Repositories\Employee\EmployeeInterface::class, \App\Repositories\Employee\EmployeeRepository::class);
    $this->app->singleton(\App\Repositories\Department\DepartmentInterface::class, \App\Repositories\Department\DepartmentRepository::class);
    $this->app->singleton(\App\Repositories\User\UserInterface::class, \App\Repositories\User\UserRepository::class);
  }
}
