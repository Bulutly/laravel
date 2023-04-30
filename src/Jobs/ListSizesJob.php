<?php

namespace Bulutly\Laravel\Jobs;

class ListSizesJob extends BaseJob
{
	public  function  handle()
	{
		$path = $this->generateUrl(config('bulutly.api.sizes.index'));
		$request = $this->get($path);

		if ($request->status() === 200) {
			return $request->json();
		}
		throw new \Exception('Cannot get sizes!');
	}
}