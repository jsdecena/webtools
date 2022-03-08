<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PatientResource;
use App\Http\Transformers\PatientTransformer;
use App\Services\PatientService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;

class PatientApiController
{
    private PatientService $patientService;

    /**
     * @param PatientService $patientService
     */
    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function index(): JsonResponse
    {
        $patients = $this->patientService->findPatients();
        return response()->json([
            'data' => PatientResource::collection(PatientTransformer::transform($patients['entry']))
        ]);
    }
}
