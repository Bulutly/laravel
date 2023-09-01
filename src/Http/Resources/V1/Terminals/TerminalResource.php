<?php

namespace Bulutly\Laravel\Http\Resources\V1\Terminals;

use Illuminate\Http\Resources\Json\JsonResource;

class TerminalResource extends JsonResource
{

    public function toArray($request){
        return [
            'id' => $this->id,
            'region' => $this->region,
            'name' => $this->name,
            'version' => $this->version,
            'server_file' => $this->server_file,
            'server_name' => $this->server_name,
            'login' => $this->login,
            'password' => $this->password,
            'synced_at' => $this->synced_at,
            'status' => $this->status,
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
