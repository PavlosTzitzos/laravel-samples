<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProducerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'firstName'     => $this->first_name,
            'secondName'    => $this->second_name,
            'lastName'      => $this->last_name,
            'description'   => $this->description,
            'producerImage' => $this->producer_image,
            'createdBy'     => $this->created_by,
            'updatedBy'     => $this->updated_by,
            'phoneNumber'   => $this->phone_number,
            'email'         => $this->email,
            'shows'         => ShowResource::collection($this->whenLoaded('shows')),
        ];
    }
}
