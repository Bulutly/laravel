<?php
namespace Bulutly\Laravel\Http\Controllers;

use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Http\Requests\V1\Buluts\StoreRequest;
use Bulutly\Laravel\Http\Resources\V1\Buluts\IndexResource;
use Bulutly\Laravel\Jobs\V1\Buluts\DeleteJob;
use Bulutly\Laravel\Jobs\V1\Buluts\IndexJob;
use Bulutly\Laravel\Jobs\V1\Buluts\ShowJob;
use Bulutly\Laravel\Jobs\V1\Buluts\StoreJob;
use Bulutly\Laravel\Jobs\V1\Buluts\UpdateJob;
use Illuminate\Http\Request;

class BulutController extends RestController
{
    public function index(){
        try{
            return $this->respond(IndexResource::collection(dispatch_sync(new IndexJob())));
        }catch (\Exception $e) {
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Buluts index failed')->respondWithError();
        }
    }

    public function store(StoreRequest $r){
        try{
            $data = $r->validated();
            return $this->respond(IndexResource::make(dispatch_sync(new StoreJob($data))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut creation failed')->respondWithError();
        }
    }

    public function show($uuid){
        try{
            return $this->respond(IndexResource::make(dispatch_sync(new ShowJob($uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut not found')->respondWithError();
        }
    }

    public function update($uuid, Request $r){
        try{
            return $this->respond(IndexResource::make(dispatch_sync(new UpdateJob($uuid, $r->all()))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut update failed')->respondWithError();
        }
    }

    public function delete($uuid){
        try{
            return $this->respond(IndexResource::make(dispatch_sync(new DeleteJob($uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Bulut delete failed')->respondWithError();
        }
    }


}