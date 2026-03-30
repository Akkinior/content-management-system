<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StepsResource extends JsonResource
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
            'serviceid' => $this->serviceid,
            'stepsName' => $this->stepsName,
            'stepsNumber' => $this->stepsNumber,
            'stepsDescription' => $this->stepsDescription,
            'stepsImage' => $this->stepsImage
        ];
    }
}
