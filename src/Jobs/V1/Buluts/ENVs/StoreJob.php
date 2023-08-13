<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts\ENVs;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class StoreJob extends BaseRequest
{
    public $uuid, $data;

    public function __construct(string $uuid, array $data)
    {
        $this->uuid = $uuid;
        $this->data['key'] = $data['key'];
        $this->data['value'] = $data['value'];
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.envs.store'));
            $endpoint = str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->post($endpoint, $this->data);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Bulut ENV creation failed');
        }
    }

}