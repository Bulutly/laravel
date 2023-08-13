<?php
namespace Bulutly\Laravel\Jobs\V1\Projects;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class StoreJob extends BaseRequest
{
    public $data, $key;

    public function __construct(array $data, $key = null)
    {
        $this->data['name'] = $data['name'];
        $this->data['description'] = $data['description'] ?? null;
        $this->data['url'] = $data['url'] ?? null;
        $this->data['github'] = $data['github'] ?? null;
        $this->data['tags'] = $data['tags'] ?? null;
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.projects.store'));
            $req = $this->post($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Project creation failed');
        }
    }

}