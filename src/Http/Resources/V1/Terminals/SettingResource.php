<?php

namespace Bulutly\Laravel\Http\Resources\V1\Terminals;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{

    public function toArray($request){
        return [
            'max_bars' => $this->max_bars,
            'news' => $this->news,
            'live_trading' => $this->live_trading,
            'dll_import' => $this->dll_import,
            'server_name' => $this->server_name,
            'login' => $this->login,
            'password' => $this->password,
        ];
    }

}
