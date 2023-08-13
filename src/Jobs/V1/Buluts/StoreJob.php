<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts;

use Bulutly\Laravel\Repositories\Contracts\BaseRequest;

class StoreJob extends BaseRequest
{
    public $data;

    public function __construct(array $data)
    {
        $this->data['project_id'] = $data['project_id'];
        $this->data['image_id'] = $data['image_id'];
        $this->data['memory'] = $data['memory'];
        $this->data['cpu'] = $data['cpu'];
        $this->data['name'] = $data['name'];
        $this->data['region'] = $data['region'];
        $this->data['description'] = $data['description'];
        $this->data['auto_scale_cpu'] = $data['auto_scale_cpu'];
        $this->data['auto_scale_memory'] = $data['auto_scale_memory'];
        $this->data['tags'] = $data['tags'];
        $this->data['startup_script'] = $data['startup_script'];
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.store'));
            $req = $this->post($endpoint, $this->data);
            if ($req->status() === 200 or $req->status() === 201) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Bulut creation failed');
        }
    }

}