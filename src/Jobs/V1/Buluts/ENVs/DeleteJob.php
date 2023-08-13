<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts\ENVs;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class DeleteJob extends BaseRequest
{
    public $uuid, $env_uuid;

    public function __construct(string $uuid, string $env_uuid)
    {
        $this->uuid = $uuid;
        $this->env_uuid = $env_uuid;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.envs.delete'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            str_replace('{env_uuid}', $this->env_uuid, $endpoint);
            $req = $this->delete($endpoint);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Bulut ENV delete failed');
        }
    }

}