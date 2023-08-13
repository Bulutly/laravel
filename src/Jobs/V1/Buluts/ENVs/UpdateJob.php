<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts\ENVs;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class UpdateJob extends BaseRequest
{
    public $uuid, $env_uuid, $data, $key;

    /**
     * @throws \Exception
     */
    public function __construct(string $uuid, string $env_uuid, array $data, $key = null)
    {
        $this->uuid = $uuid;
        $this->env_uuid = $env_uuid;
        if(!empty($data['key'])) $this->data['key'] = $data['key'];
        if(!empty($data['value'])) $this->data['value'] = $data['value'];
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.envs.update'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            str_replace('{env_uuid}', $this->env_uuid, $endpoint);
            $req = $this->put($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Bulut ENV update failed');
        }
    }

}