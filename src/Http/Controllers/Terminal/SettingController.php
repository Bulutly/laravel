<?php
namespace Bulutly\Laravel\Http\Controllers\Terminal;

use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Http\Requests\V1\Terminals\Setting\UpdateRequest;
use Bulutly\Laravel\Http\Resources\V1\Terminals\SettingResource;
use Bulutly\Laravel\Jobs\V1\Terminals\Setting\ShowJob;
use Bulutly\Laravel\Jobs\V1\Terminals\Setting\UpdateJob;

class SettingController extends RestController
{
    public function show($uuid){
        try{
            return $this->respond(SettingResource::make(dispatch_sync(new ShowJob($uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal setting not found')->respondWithError();
        }
    }

    public function update($uuid, UpdateRequest $r){
        try{
            return $this->respond(SettingResource::make(dispatch_sync(new UpdateJob($uuid, $r->validated()))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal setting update failed')->respondWithError();
        }
    }

}