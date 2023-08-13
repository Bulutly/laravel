<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts\ENVs;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class IndexJob extends BaseRequest
{

    public $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.envs.index'));
            $endpoint = str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->get($endpoint);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Bulut ENVs index failed');
        }
    }

}