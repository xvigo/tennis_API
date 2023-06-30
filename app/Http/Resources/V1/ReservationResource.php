<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'courtId' => $this->court->id,
            'courtName' => $this->court->name,
            'userId' => $this->user->id,
            'phoneNumber' => $this->user->phone,
            'start' => $this->start,
            'end' => $this->end,
            'gameType' => $this->game_type
        ];
    }
}
