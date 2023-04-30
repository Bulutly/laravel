<?php

namespace Bulutly\Laravel\Jobs;

use Illuminate\Support\Facades\Http;

class BaseJob
{
	public function generateUrl(string $path): string
	{

		return config('bulutly.api.base_api_path') . '/' . $path;
	}

	public function post($path, $payload, $token = null)
	{
		$request = Http::withHeaders($this->getHeaders($token))->post($path, $payload);
		return $request;
	}

	public function get($path, $token = null)
	{
		$request = Http::withHeaders($this->getHeaders($token))->get($path);
		return $request;
	}

	protected function getHeaders($token = null)
	{
		$headers =
			[
				'accept' => 'application/json',
				'content-type' => 'application/json',
				'api-key' => config('bulutly.api_key')
			];

		if ($token) {
			$headers['Authorization'] = "Bearer " . $token;
		}

		return $headers;
	}
}
