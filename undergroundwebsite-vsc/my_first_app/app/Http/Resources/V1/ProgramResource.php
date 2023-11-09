<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'dayOfTheWeek'    => $this->program_weekday,
            'showStartTime'   => $this->show_start_time,
            'showEndTime'     => $this->show_end_time,
            'showId'          => $this->show_id
        ];
    }
}
