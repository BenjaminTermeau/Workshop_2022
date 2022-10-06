<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DataService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getData()
    {
        return $this->client->request(
            Request::METHOD_GET,
            'http://127.0.0.1:7999/data'
        );
    }

    public function getEtatFilet()
    {
        return $this->client->request(
            Request::METHOD_GET,
            'http://127.0.0.1:7999/etatFilet'
        );
    }
}