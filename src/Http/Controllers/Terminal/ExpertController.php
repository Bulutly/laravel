<?php
namespace Bulutly\Laravel\Http\Controllers\Terminal;

use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Http\Requests\V1\Terminals\Experts\StoreRequest;
use Bulutly\Laravel\Http\Resources\V1\Terminals\ExpertResource;
use Bulutly\Laravel\Jobs\V1\Terminals\Experts\DeleteJob;
use Bulutly\Laravel\Jobs\V1\Terminals\Experts\IndexJob;
use Bulutly\Laravel\Jobs\V1\Terminals\Experts\StoreJob;
use Illuminate\Http\Request;

class ExpertController extends RestController
{
    public function index($uuid){
        try{
            return $this->respond(ExpertResource::collection(dispatch_sync(new IndexJob($uuid))));
        }catch (\Exception $e) {
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal expert index failed')->respondWithError();
        }
    }

    public function store($uuid, StoreRequest $r){
        try{
            $data = $r->validated();
            return $this->respond(ExpertResource::make(dispatch_sync(new StoreJob($uuid, $data))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal expert creation failed')->respondWithError();
        }
    }

    public function delete($uuid, $expert_uuid){
        try{
            return $this->respond(ExpertResource::make(dispatch_sync(new DeleteJob($uuid, $expert_uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal expert delete failed')->respondWithError();
        }
    }


}