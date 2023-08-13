<?php
namespace Bulutly\Laravel\Http\Controllers;

use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Http\Requests\V1\Buluts\ENVs\StoreRequest;
use Bulutly\Laravel\Http\Requests\V1\Buluts\ENVs\UpdateRequest;
use Bulutly\Laravel\Http\Resources\V1\Buluts\ENVResource;
use Bulutly\Laravel\Jobs\V1\Buluts\ENVs\DeleteJob;
use Bulutly\Laravel\Jobs\V1\Buluts\ENVs\IndexJob;
use Bulutly\Laravel\Jobs\V1\Buluts\ENVs\StoreJob;
use Bulutly\Laravel\Jobs\V1\Buluts\ENVs\UpdateJob;
use Illuminate\Http\Request;

class ENVController extends RestController
{
    public function index($uuid){
        try{
            return $this->respond(ENVResource::collection(dispatch_sync(new IndexJob($uuid))));
        }catch (\Exception $e) {
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut ENVs index failed')->respondWithError();
        }
    }

    public function store($uuid, StoreRequest $r){
        try{
            $data = $r->validated();
            return $this->respond(ENVResource::make(dispatch_sync(new StoreJob($uuid, $data))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut creation failed')->respondWithError();
        }
    }

    public function update($uuid, $env_uuid, UpdateRequest $r){
        try{
            $data = $r->validated();
            return $this->respond(ENVResource::make(dispatch_sync(new UpdateJob($uuid, $env_uuid, $data))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut update failed')->respondWithError();
        }
    }

    public function delete($uuid, $env_uuid){
        try{
            return $this->respond(ENVResource::make(dispatch_sync(new DeleteJob($uuid, $env_uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut delete failed')->respondWithError();
        }
    }


}