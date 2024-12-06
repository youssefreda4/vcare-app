<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Front\DoctorResource;

class MajorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'majorName' => $this->name,
            'majorImage' => $this->image,
            'doctor' => DoctorResource::collection($this->whenLoaded('doctor')),
        ];
    }
}
