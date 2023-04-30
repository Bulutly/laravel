<?php

namespace Bulutly\Laravel\Jobs;

class ListDropletsJob extends BaseJob
{
	public  function  handle()
	{
		$path = $this->generateUrl(config('bulutly.api.droplets.index'));
		$request = $this->get($path);

		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Cannot get droplets!');
	}
}