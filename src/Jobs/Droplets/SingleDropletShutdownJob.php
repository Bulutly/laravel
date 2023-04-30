<?php

namespace Bulutly\Laravel\Jobs\Droplets;
use Bulutly\Laravel\Jobs\BaseJob;
class SingleDropletShutdownJob extends BaseJob
{

	public function __construct(public string $droplet_id) {}

	public  function  handle()
	{
		$path = $this->generateUrl(config('bulutly.api.droplets.shutdown'));
		$path = str_replace('{id}',$this->droplet_id,$path);
		$request = $this->get($path);
		if ($request->status() === 200) {
			return $request->json();
		}
		throw new \Exception('Cannot shutdown droplet!');
	}
}