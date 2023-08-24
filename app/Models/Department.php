<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
  use HasFactory, HasUuids;

  protected $fillable = [
    'name',
    'slug'
  ];

  public function employees()
  {
    return $this->hasMany(Employee::class);
  }
}
