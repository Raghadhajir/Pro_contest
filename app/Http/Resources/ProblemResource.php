<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProblemResource extends JsonResource
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
            'title'=>$this->title,
            'description'=>$this->description,
            'file'=>$this->file,
            'level'=>$this->level

        ];
    }
}
