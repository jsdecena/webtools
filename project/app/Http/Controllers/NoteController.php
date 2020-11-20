<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoteRequest;
use App\Models\Note;
use App\Repositories\PatientRepository;
use Illuminate\Database\QueryException;

class NoteController extends Controller
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
     * @param $id
     * @return mixed
     */
    public function create($id)
    {
        return view('app.patients.note')->with([
            'patient' => $this->patientRepository->findPatientById($id)
        ]);
    }

    /**
     * @param CreateNoteRequest $request
     * @param $patientId
     * @return mixed
     */
    public function store(CreateNoteRequest $request, $patientId)
    {
        try {
            $patient = $this->patientRepository->findPatientById($patientId);

            $patientRepo = new PatientRepository($patient);
            $patientRepo->createNotes($request->only(Note::FILLABLES), $request->user('admin'));

            return redirect()->route('patient.show', $patientId)->with('success', 'Create note success!');

        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'There is a problem creating the note. Check logs.'
            ]);
        }
    }
}
