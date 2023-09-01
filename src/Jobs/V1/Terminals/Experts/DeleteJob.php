<?php
namespace Bulutly\Laravel\Jobs\V1\Terminals\Experts;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class DeleteJob extends BaseRequest
{
    public string|int $id, $expert_id;
    public $key;

    /**
     * @throws \Exception
     */
    public function __construct(string|int $id, string|int $expert_id, $key = null)
    {
        $this->id = $id;
        $this->expert_id = $expert_id;
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.terminals.experts.delete'));
            str_replace('{uuid}', $this->id, $endpoint);
            str_replace('{expert_uuid}', $this->expert_id, $endpoint);
            $req = $this->delete($endpoint, null, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Terminal expert delete failed');
        }
    }

}