<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'points' => $this->score,
            'birthday'=>$this->birthday,
            'college'=>$this->college ? $this->college : null,
        ];
    }
}
