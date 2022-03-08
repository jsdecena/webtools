<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PatientResource;
use App\Http\Transformers\PatientTransformer;
use App\Services\PatientService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientApiController
{
    private PatientService $patientService;
    private PatientTransformer $patientTransformer;

    /**
     * @param PatientService $patientService
     * @param PatientTransformer $patientTransformer
     */
    public function __construct(
        PatientService $patientService,
        PatientTransformer $patientTransformer
    )
    {
        $this->patientService = $patientService;
        $this->patientTransformer = $patientTransformer;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $patients = $this->patientService->findPatients($request->all());
        return response()->json([
            'data' => PatientResource::collection($this->patientTransformer->transformMany($patients['entry']))
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $patient = $this->patientService->findPatientById($id);

        return response()->json([
            'data' => new PatientResource($this->patientTransformer->transformOne($patient))
        ]);
    }
}
