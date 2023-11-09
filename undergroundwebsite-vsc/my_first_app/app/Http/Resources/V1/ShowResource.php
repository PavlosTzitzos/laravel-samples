<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'showName'          => $this->show_name,
            'showDescription'   => $this->show_description,
            'showLogo'          => $this->show_logo,
            'createdBy'         => $this->created_by,
            'updatedBy'         => $this->updated_by,
            'producers'         => ProducerResource::collection($this->whenLoaded('producers')),
        ];
    }
}
