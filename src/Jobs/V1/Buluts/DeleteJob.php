<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class DeleteJob extends BaseRequest
{
    public $uuid, $key;

    /**
     * @throws \Exception
     */
    public function __construct(string $uuid, $key = null)
    {
        $this->uuid = $uuid;
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.delete'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->delete($endpoint, null, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Buluts delete failed');
        }
    }

}