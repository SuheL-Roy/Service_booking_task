<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'booking_date' => $this->booking_date,
            'status'       => $this->status,
            'service_name' => $this->service_name, // from join
            'user_name'    => $this->user_name,    // from join
        ];
    }
}
