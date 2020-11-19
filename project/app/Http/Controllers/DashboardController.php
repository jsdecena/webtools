<?php

namespace App\Http\Controllers;

use App\Repositories\PatientRepository;

class DashboardController extends Controller
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

    /**
     * @return mixed
     */
    public function index()
    {
        return view('dashboard', ['patients' => $this->patientRepository->all()]);
    }
}
