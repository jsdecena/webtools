<?php

namespace App\Base;

use GuzzleHttp\Client;

abstract class BaseHttpService
{
    protected Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => config('app.fhir_server') . config('app.fhir_base'),
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'headers' => [
                'Accept' => 'application/fhir+json'
            ]
        ]);
    }
}
