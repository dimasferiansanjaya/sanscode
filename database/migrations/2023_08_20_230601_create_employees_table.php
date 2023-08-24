<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('employees', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('department_id')->nullable(true);
      $table->integer('employee_id')->unique()->index();
      $table->string('employee_name');
      $table->date('hire_date');
      $table->date('birth_date');
      $table->string('gender', 25);
      $table->string('phone_number', 20)->nullable(true);
      $table->string('picture_url')->nullable(true);
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employees');
  }
};
