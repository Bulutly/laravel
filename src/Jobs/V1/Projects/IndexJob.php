<?php
namespace Bulutly\Laravel\Jobs\V1\Projects;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class IndexJob extends BaseRequest
{
    public $key;

    public function __construct($key = null){
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.projects.index'));
            $req = $this->get($endpoint, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Projects index failed');
        }
    }

}