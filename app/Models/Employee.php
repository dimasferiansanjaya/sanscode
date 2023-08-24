<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
  use HasFactory, HasUuids, SoftDeletes;

  protected $fillable = [
    'department_id',
    'employee_id',
    'employee_name',
    'hire_date',
    'birth_date',
    'gender',
    'phone_number',
    'picture_url',
  ];

  protected $casts = [
    'hire_date' => 'datetime',
    'birth_date' => 'datetime',
  ];

  protected $dates = ['deleted_at'];

  public function department()
  {
    return $this->belongsTo(Department::class);
  }
}
