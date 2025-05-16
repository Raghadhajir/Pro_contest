<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->uuid,
            'name'=>$this->name,
            'name contest'=>$this->contest->name,
            'members'=>UserResource::collection($this->users()->get()),
            'coach name'=>$this->User->name,
            'coach id'=>$this->User->uuid,
            'created_at' => $this->created_at->toDateString(),

        ];
    }
}
