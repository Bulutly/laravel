<?php
namespace Bulutly\Laravel\Repositories\Contracts;

use Illuminate\Support\Facades\Http;

abstract class BaseRequest
{
    public function post($path, $payload = null, $token = null)
    {
        if ($payload === null) return Http::withHeaders($this->getHeaders($token))->post($path);
        return Http::withHeaders($this->getHeaders($token))->post($path, $payload);
    }

    public function put($path, $payload = null, $token = null)
    {
        if ($payload === null) return Http::withHeaders($this->getHeaders($token))->put($path);
        return Http::withHeaders($this->getHeaders($token))->put($path, $payload);
    }

    public function delete($path, $payload = null, $token = null)
    {
        if ($payload === null) return Http::withHeaders($this->getHeaders($token))->delete($path);
        return Http::withHeaders($this->getHeaders($token))->delete($path, $payload);
    }

    public function get($path, $token = null)
    {
        return Http::withHeaders($this->getHeaders($token))->get($path);
    }

    public function generateApiUrl(string $path): string
    {
        $baseUrl = config('bulutly.sandbox', false) ? config('bulutly.api.sandbox_url') : config('bulutly.api.url');
        return $baseUrl.'/'.config('bulutly.api.version').'/'.$path;

    }

    public function getHeaders($token = null): array
    {
        $headers =
            [
                'accept' => 'application/json',
                'content-type' => 'application/json',
                'X-BULUTLY-API' => config('bulutly.api.key'),
            ];
        if ($token) {
            $headers['Authorization'] = 'Bearer '.$token;
        }
        return $headers;
    }

}