<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'fullName' => $this->fullName,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'address'=> $this->address,
            'city'=> $this->city,
            'state'=> $this->state,
            'zipcode'=> $this->zipcode,
            'charges'=> ChargeResource::collection($this->whenLoaded('charges')),
            'payments'=> PaymentResource::collection($this->whenLoaded('payments'))
        ];
    }
}
