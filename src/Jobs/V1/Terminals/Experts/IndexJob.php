<?php
namespace Bulutly\Laravel\Jobs\V1\Terminals\Experts;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class IndexJob extends BaseRequest
{
    public string|int $id;
    public $key;

    public function __construct(string|int $id, $key = null){
        $this->id = $id;
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.terminals.experts.index'));
            str_replace('{uuid}', $this->id, $endpoint);
            $req = $this->get($endpoint, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Terminal experts index failed');
        }
    }

}