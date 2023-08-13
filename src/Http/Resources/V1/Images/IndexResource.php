<?php

namespace Bulutly\Laravel\Http\Resources\V1\Images;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{

    public function toArray(Request $request)
    {
        return [
            'uuid' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'download_count' => $this->download_count,
            'size_count' => $this->size_count,
            'last_updated' => $this->last_updated,
            'latest_version' => $this->latest_version,
            'is_official' => $this->is_official,
            'is_featured' => $this->is_featured,
            'is_pinned' => $this->is_pinned,
            'is_public' => $this->is_public,
            'tags' => $this->tags->pluck('title'),
            'type' => $this->type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
