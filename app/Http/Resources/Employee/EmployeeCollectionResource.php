<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeCollectionResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'data' => $this->collection,
      'links' => [
        'self' => 'link-to-current-page',
        'first' => $this->collection->url(1),
        'last' => $this->collection->url($this->lastPage()),
        'prev' => $this->collection->previousPageUrl(),
        'next' => $this->collection->nextPageUrl(),
      ],
      'meta' => [
        'current_page' => $this->collection->currentPage(),
        'from' => $this->collection->firstItem(),
        'last_page' => $this->collection->lastPage(),
        'per_page' => $this->collection->perPage(),
        'to' => $this->collection->lastItem(),
        'total' => $this->collection->total(),
      ],
    ];
  }
}
