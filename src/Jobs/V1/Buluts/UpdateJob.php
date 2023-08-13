<?php
namespace Bulutly\Laravel\Jobs\V1\Buluts;

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
        if(!empty($data['project_id'])) $this->data['project_id'] = $data['project_id'];
        if(!empty($data['image_id'])) $this->data['image_id'] = $data['image_id'];
        if(!empty($data['memory'])) $this->data['memory'] = $data['memory'];
        if(!empty($data['cpu'])) $this->data['cpu'] = $data['cpu'];
        if(!empty($data['name'])) $this->data['name'] = $data['name'];
        if(!empty($data['region'])) $this->data['region'] = $data['region'];
        if(!empty($data['description'])) $this->data['description'] = $data['description'];
        if(!empty($data['auto_scale_cpu'])) $this->data['auto_scale_cpu'] = $data['auto_scale_cpu'];
        if(!empty($data['auto_scale_memory'])) $this->data['auto_scale_memory'] = $data['auto_scale_memory'];
        if(!empty($data['tags'])) $this->data['tags'] = $data['tags'];
        if(!empty($data['startup_script'])) $this->data['startup_script'] = $data['startup_script'];
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.buluts.update'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->put($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Bulut update failed');
        }
    }

}