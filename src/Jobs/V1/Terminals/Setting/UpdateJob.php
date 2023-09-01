<?php
namespace Bulutly\Laravel\Jobs\V1\Terminals\Setting;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class UpdateJob extends BaseRequest
{
    public $uuid, $data, $key;

    /**
     * @throws \Exception
     */
    public function __construct(string $uuid, array $data, $key = null)
    {
        $this->uuid = $uuid;
        if (empty($data)) throw new \Exception('No data provided');
        array_key_exists('login', $data) ?? $this->data['login'] = $data['login'];
        array_key_exists('password', $data) ?? $this->data['password'] = $data['password'];
        array_key_exists('server_name', $data) ?? $this->data['server_name'] = $data['server_name'];
        array_key_exists('max_bars', $data) ?? $this->data['max_bars'] = $data['max_bars'];
        array_key_exists('news', $data) ?? $this->data['news'] = $data['news'];
        array_key_exists('live_trading', $data) ?? $this->data['live_trading'] = $data['live_trading'];
        array_key_exists('dll_import', $data) ?? $this->data['dll_import'] = $data['dll_import'];
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.terminals.setting.update'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->put($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Setting update failed');
        }
    }

}