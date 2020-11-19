<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Models\Patient;
use App\Repositories\PatientRepository;
use Illuminate\Database\QueryException;

class PatientController extends Controller
{
    private $patientRepository;

    /**
     * PatientController constructor.
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function create()
    {
        return view('app.patients.create');
    }

    public function store(CreatePatientRequest $request)
    {
        try {
            $this->patientRepository->createPatient($request->only(Patient::FILLABLES));

            return redirect()->route('dashboard')->with('success', 'Create patient success!');

        } catch (QueryException $e) {
            dd($e);
            return redirect()->back()->withInput()->withErrors([
                'error' => 'There is a problem creating the patient. Check logs.'
            ]);
        }
    }
}
