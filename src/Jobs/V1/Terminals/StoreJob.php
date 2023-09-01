<?php
namespace Bulutly\Laravel\Jobs\V1\Terminals;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class StoreJob extends BaseRequest
{
    public $data, $key;

    public function __construct(array $data, $key = null)
    {
        $this->data['login'] = $data['login'];
        $this->data['password'] = $data['password'];
        $this->data['server_name'] = $data['server_name'];
        $this->data['region'] = $data['region'];
        $this->data['version'] = $data['version'];
        $this->data['project_id'] = $data['project_id'];
        array_key_exists('server_file', $data) ?? $this->data['server_file'] = $data['server_file'];
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.terminals.store'));
            $req = $this->post($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Terminal creation failed');
        }
    }

}