<?php

namespace Bulutly\Laravel\Http\Resources\V1\Terminals;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpertResource extends JsonResource
{

    public function toArray($request){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'timeframe' => $this->timeframe,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
