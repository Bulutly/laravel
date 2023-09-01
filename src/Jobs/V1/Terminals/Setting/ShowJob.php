<?php
namespace Bulutly\Laravel\Jobs\V1\Terminals\Setting;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class ShowJob extends BaseRequest
{

    public $uuid, $key;

    public function __construct(string $uuid, $key = null)
    {
        $this->uuid = $uuid;
        $this->key = $key;
    }
    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.terminals.setting.show'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->get($endpoint, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Setting show failed');
        }
    }

}