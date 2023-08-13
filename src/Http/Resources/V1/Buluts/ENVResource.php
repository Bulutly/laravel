<?php

namespace Bulutly\Laravel\Http\Resources\V1\Buluts;

use Illuminate\Http\Resources\Json\JsonResource;

class ENVResource extends JsonResource
{

    public function toArray($request){
        return [
            'uuid' => $this->id,
            'key' => $this->key,
            'value' => $this->value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
