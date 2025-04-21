<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone ? $this->phone : null,
            'image' => $this->image ? $this->image : null,
            'coach' => 'yes',
            'birthday' => $this->birthday,
            'college' => $this->college ? $this->college : null,
        ];
    }
}
