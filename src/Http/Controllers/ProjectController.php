<?php
namespace Bulutly\Laravel\Http\Controllers;

use Bulutly\Laravel\Http\Requests\V1\Projects\StoreRequest;
use Bulutly\Laravel\Http\Resources\V1\Projects\IndexResource;
use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Jobs\V1\Projects\ShowJob;
use Bulutly\Laravel\Jobs\V1\Projects\StoreJob;
use Bulutly\Laravel\Jobs\V1\Projects\IndexJob;
use Bulutly\Laravel\Jobs\V1\Projects\UpdateJob;
use Illuminate\Http\Request;

class ProjectController extends RestController
{
    public function index(){
        try{
            return $this->respond(IndexResource::collection(dispatch_sync(new IndexJob())));
        }catch (\Exception $e) {
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Projects index failed')->respondWithError();
        }
    }

    public function store(StoreRequest $r){
        try{
            $data = $r->validated();
            return $this->respond(IndexResource::make(dispatch_sync(new StoreJob($data))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Project creation failed')->respondWithError();
        }
    }

    public function show($uuid){
        try{
            return $this->respond(IndexResource::make(dispatch_sync(new ShowJob($uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Project not found')->respondWithError();
        }
    }

    public function update($uuid, Request $r){
        try{
            return $this->respond(IndexResource::make(dispatch_sync(new UpdateJob($uuid, $r->all()))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Project update failed')->respondWithError();
        }
    }

    public function delete($uuid){
        try{
            return $this->respond(IndexResource::make(dispatch_sync(new DeleteJob($uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Project delete failed')->respondWithError();
        }
    }


}