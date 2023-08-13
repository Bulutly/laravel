<?php
namespace Bulutly\Laravel\Jobs\V1\Projects;

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
        if(!empty($data['name'])) $this->data['name'] = $data['name'];
        if(!empty($data['description'])) $this->data['description'] = $data['description'];
        if(!empty($data['url'])) $this->data['url'] = $data['url'];
        if(!empty($data['github'])) $this->data['github'] = $data['github'];
        if(!empty($data['tags'])) $this->data['tags'] = $data['tags'];
        $this->key = $key;
    }

    public function handle(){
        try{
            $endpoint = $this->generateApiUrl(config('bulutly.api.endpoints.projects.update'));
            str_replace('{uuid}', $this->uuid, $endpoint);
            $req = $this->put($endpoint, $this->data, null, $this->key);
            if ($req->status() === 200) return $req->json();
            throw new \Exception($req->json()['message']);
        }catch (\Exception $e){
            if (config('bulutly.debug')) throw new \Exception($e->getMessage());
            throw new \Exception('Project update failed');
        }
    }

}