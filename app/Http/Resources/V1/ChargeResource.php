<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'memberId'=> $this->member_id,
            'amount' => $this->amount,            
            'status'=> $this->status,
            'creationDate' => $this->creationDate,            
            'cancelationDate' => $this->cancelationDate
        ];
    }
}
