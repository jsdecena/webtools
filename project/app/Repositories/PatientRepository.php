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

    /**
     * Find the patient
     *
     * @param $id
     * @return mixed
     */
    public function findPatientById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update the patient
     *
     * @param array $data
     * @return bool
     */
    public function updatePatient(array $data): bool
    {
        return $this->model->update($data);
    }
}
