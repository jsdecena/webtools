<?php

namespace App\Services;

use App\Base\BaseHttpService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class PatientService extends BaseHttpService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $queryParams
     * @return array
     */
    public function findPatients(array $queryParams = []): array
    {
        $uri = 'Patient?';
        if (!empty($queryParams)) {
            $uri .= http_build_query($queryParams);
        }
        try {
            $response = $this->httpClient->get($uri);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error($e->getTraceAsString());
            return [];
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function findPatientById($id): array
    {
        try {
            $response = $this->httpClient->get("Patient/$id");

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error($e->getTraceAsString());
            return [];
        }
    }
}
