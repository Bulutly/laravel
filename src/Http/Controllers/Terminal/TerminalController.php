<?php
namespace Bulutly\Laravel\Http\Controllers\Terminal;

use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Http\Requests\V1\Terminals\StoreRequest;
use Bulutly\Laravel\Http\Resources\V1\Terminals\TerminalResource;
use Bulutly\Laravel\Jobs\V1\Terminals\DeleteJob;
use Bulutly\Laravel\Jobs\V1\Terminals\IndexJob;
use Bulutly\Laravel\Jobs\V1\Terminals\StoreJob;
use Illuminate\Http\Request;

class TerminalController extends RestController
{
    public function index(){
        try{
            return $this->respond(TerminalResource::collection(dispatch_sync(new IndexJob())));
        }catch (\Exception $e) {
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminals index failed')->respondWithError();
        }
    }

    public function store(StoreRequest $r){
        try{
            $data = $r->validated();
            return $this->respond(TerminalResource::make(dispatch_sync(new StoreJob($data))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal creation failed')->respondWithError();
        }
    }

    public function delete($uuid){
        try{
            return $this->respond(TerminalResource::make(dispatch_sync(new DeleteJob($uuid))));
        }catch (\Exception $e){
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Terminal delete failed')->respondWithError();
        }
    }


}