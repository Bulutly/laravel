<?php
namespace Bulutly\Laravel\Http\Controllers;

use Briofy\RestLaravel\Http\Controllers\RestController;
use Bulutly\Laravel\Http\Resources\V1\Images\IndexResource;
use Bulutly\Laravel\Jobs\V1\Images\IndexJob;
use Illuminate\Http\Request;

class ImageController extends RestController
{
    public function index(){
        try{
            return $this->respond(IndexResource::collection(dispatch_sync(new IndexJob())));
        }catch (\Exception $e) {
            if (config('bulutly.debug')) return $this->setErrorMessage($e->getMessage())->respondWithError();
            return $this->setErrorMessage('Images index failed')->respondWithError();
        }
    }

}