<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ExceptionHandler
{
  use ApiResponse;

  public function handleApiException(\Throwable $e)
  {
    if ($e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
      return $this->error($e->getMessage(), null, Response::HTTP_METHOD_NOT_ALLOWED);
    }
    if ($e instanceof \Illuminate\Auth\AuthenticationException) {
      return $this->error($e->getMessage(), null, Response::HTTP_UNAUTHORIZED);
    }
    if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
      return $this->error('The requested resource was not found.', null, Response::HTTP_NOT_FOUND);
    }
    if ($e->getCode() == 23000) { // MySQL constraint violation error code
      return $this->error('The data you are trying to insert already exists.', null, Response::HTTP_CONFLICT);
    }
    // if ($e instanceof \Symfony\Component\Mailer\Exception\TransportException) {
    //   return $this->error('The requested resource was not found.', null, Response::HTTP_NOT_FOUND);
    // }
    return $this->error($e->getMessage(), null, Response::HTTP_INTERNAL_SERVER_ERROR);
  }
}
