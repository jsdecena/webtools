<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Note;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @param array $data
     * @param Employee $employee
     * @return Model
     */
    public function createNotes(array $data, Employee $employee) : Model
    {
        $data['employee_id'] = $employee->id;
        return $this->model->notes()->create($data);
    }

    /**
     * @return mixed
     */
    public function listNotes(): Collection
    {
        return $this->model->notes;
    }
}
