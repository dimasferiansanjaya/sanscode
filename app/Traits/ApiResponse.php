<?php

namespace App\Traits;

trait ApiResponse
{
  /**
   * Core of response
   *
   * @param   string          $message
   * @param   array|object    $data
   * @param   string          $status
   * @param   integer         $statusCode
   */
  public function coreResponse($message, $data, $status, $statusCode)
  {
    // Send the response
    $response = [
      'status' => $status,
      'code' => $statusCode,
      'message' => $message,
      'data' => $data
    ];
    return response()->json($response, $statusCode);
  }

  public function successWithPagination($message, \Illuminate\Http\Resources\Json\AnonymousResourceCollection $data, $statusCode = 200)
  {
    $meta = [
      'current_page' => $data->currentPage(),
      'last_page' => $data->lastPage(),
      'per_page' => $data->perPage(),
      'total' => $data->total(),
    ];
    $response = [
      'status' => 'success',
      'code' => $statusCode,
      'message' => $message,
      'data' => $data->items(),
      'meta' => $meta
    ];
    return response()->json($response, $statusCode);
  }

  public function successLogin($token, $data, $statusCode = 200)
  {
    // Send the response
    $response = [
      'status' => 'success',
      'code' => $statusCode,
      'message' => 'Login success.',
      'token' => $token,
      'token_type' => 'Bearer',
      'data' => $data
    ];
    return response()->json($response, $statusCode);
  }

  /**
   * Send any success response
   *
   * @param   string          $message
   * @param   array|object    $data
   * @param   integer         $statusCode
   */
  public function success($message, $data, $statusCode = 200)
  {
    return $this->coreResponse($message, $data, "success", $statusCode);
  }

  /**
   * Send any error response
   * @param   string          $message
   * @param   array|object    $data
   * @param   integer         $statusCode
   */
  public function error($message, $data = null, $statusCode = 500)
  {
    return $this->coreResponse($message, $data, "error", $statusCode);
  }
}
