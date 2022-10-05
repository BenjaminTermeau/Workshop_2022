<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class DataService
{
    public function getData(): JsonResponse
    {
        return $request = $this->client->request(
            Request::METHOD_GET,
            'http://127.0.0.1:7999/data'
        );
    }
}