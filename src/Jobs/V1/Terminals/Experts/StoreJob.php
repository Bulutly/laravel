<?php
namespace Bulutly\Laravel\Jobs\V1\Terminals\Experts;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class StoreJob extends BaseRequest
{
    public string|int $id;
    public $data, $key;

    public function __construct(string|int $id, array $data, $key = null)
    {
        $this->id = $id;
        $this->data['expert'] = $data['expert'];
        $this->data['symbol'] = $data['symbol'];
        $this->data['timeframe'] = $data['timeframe'];
        array_key_exists('setting', $data) ?? $this->data['setting'] = $data['setting'];
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.terminals.experts.store'));
            str_replace('{uuid}', $this->id, $endpoint);
            $req = $this->post($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Terminal creation failed');
        }
    }

}