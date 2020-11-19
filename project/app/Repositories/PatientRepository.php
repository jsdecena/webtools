<?php

namespace App\Repositories;

use App\Models\Patient;

class PatientRepository
{
    protected $model;

    public function __construct(Patient $patient)
    {
        $this->model = $patient;
    }

    /**
     * Create the patient
     *
     * @param array $data
     * @return Patient
     */
    public function createPatient(array $data): Patient
    {
        return $this->model->create($data);
    }

    /**
     * List all patients
     *
     * @param int $perPage
     * @return mixed
     */
    public function all(int $perPage = 10)
    {
        return $this->model->paginate($perPage);
    }
}
