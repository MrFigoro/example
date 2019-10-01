<?php
namespace App\System\External\Parser\Client;

use GuzzleHttp\Client as HttpClient;

class Client
{
    protected $httpClient;
    public function __construct()
    {
        $this->httpClient = new HttpClient();
    }

    public function get(string $url)
    {
        $response = $this->httpClient->get($url);
        return $response->getBody()->getContents();
    }
}