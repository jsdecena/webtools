<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Repositories\PatientRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Create the patient
     *
     * @param CreatePatientRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePatientRequest $request)
    {
        try {
            $this->patientRepository->createPatient($request->only(Patient::FILLABLES));

            return redirect()->route('dashboard')->with('success', 'Create patient success!');

        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'There is a problem creating the patient. Check logs.'
            ]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return view('app.patients.show')
            ->with(['patient' => $this->patientRepository->findPatientById($id)]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('app.patients.edit')
            ->with(['patient' => $this->patientRepository->findPatientById($id)]);
    }

    public function update(UpdatePatientRequest $request, $id)
    {
        try {
            $patient = $this->patientRepository->findPatientById($id);

            $patientRepo = new PatientRepository($patient);
            $patientRepo->updatePatient($request->only(Patient::FILLABLES));

            return redirect()->route('patient.edit', $id)->with('success', 'Patient successfully updated!');

        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'There is a problem updating the patient. Check logs.'
            ]);
        }
    }
}
