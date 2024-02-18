<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'paymentDate' => $this->paymentDate,
            'validationDate' => $this->validationDate ,           
            'cancelationDate' => $this->cancelationDate         
            
        ];
    }
}
