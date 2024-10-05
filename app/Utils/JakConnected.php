<?php

namespace App\Utils;

use Exception;
use GuzzleHttp\Client;

class JakConnected
{

    protected $client;
    protected $url;
    protected $username;
    protected $password;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->url = config('jakConnected.base_url');
        $this->username = config('jakConnected.username');
        $this->password = config('jakConnected.password');
    }
    public function getKetersediaanBed()
    {   
        try {
            $response = $this->client->get($this->url . 'bed_availability', [
                'headers' => [
                    'Username' => $this->username,
                    'Password' => $this->password,
                    'Accept' => 'application/json',
                ]
            ]);

            $responseBody = (string) $response->getBody();
            return $responseBody;
        } catch (Exception $err) {
            dd($err->getMessage());
        }
    }
}
