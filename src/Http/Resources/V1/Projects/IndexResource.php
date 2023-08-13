<?php

namespace Bulutly\Laravel\Http\Resources\V1\Projects;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'image' => $this->image,
            'github' => $this->github,
            'status' => $this->status,
            'tags' => !empty($this->tags) ? $this->tags->pluck('title') : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
