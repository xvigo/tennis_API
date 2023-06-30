<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $duration = date_diff(date_create($this->end), date_create($this->start));
        $minutesDuration = $duration->h * 60 + $duration->i;    
        $minuteRate = $this->gameType == 'singles' ? $this->surface->price : $this->court->surface->price * 1.5; 
        $totalPrice = $minutesDuration * $minuteRate;

        return [
            'totalPrice' => $totalPrice
        ];
    }
}
