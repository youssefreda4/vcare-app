<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Request;
use App\Http\Resources\Front\MajorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'doctorName' =>$this->name,
            'doctorImage' => $this->image,
            'major' => MajorResource::make($this->whenLoaded('major')) 
        ];
    }
}
