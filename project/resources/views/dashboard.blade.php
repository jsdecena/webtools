@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        {{csrf_field()}}
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <h3 class="card-title">List of Patients</h3>
                </div>
                <div class="col">
                    <p class="fa-pull-right"><a href="{{route('patient.create')}}" class="btn btn-sm btn-primary">Create Patient</a></p>
                </div>
            </div>
            <div class="card-body">
                @if(session()->get('success'))
                    <p class="alert alert-success">{{session()->get('success')}}</p>
                @endif
                @if(!$patients->isEmpty())
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Is Active?</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->id}}</td>
                            <td><a href="{{route('patient.show', $patient->id)}}">{{$patient->full_name}}</a></td>
                            <td>{{$patient->gender}}</td>
                            <td class="toggle-btn">
                                @if($patient->active == 1)
                                    <button data-patient-id="{{$patient->id}}" class="btn btn-sm btn-success disable">Click to disable</button>
                                @else
                                    <button data-patient-id="{{$patient->id}}" class="btn btn-sm btn-danger enable">Click to enable</button>
                                @endif
                            </td>
                            <td class="action-btn">
                                <p class="fa-pull-right">
                                    <a href="{{route('patient.show', $patient->id)}}" class="btn btn-sm btn-dark">View</a>
                                    <a href="{{route('patient.edit', $patient->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('patient.note', $patient->id)}}" class="btn btn-sm btn-warning">Add Note</a>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <p class="alert alert-warning">No patient created yet ...</p> <a href="{{route('patient.create')}}" class="btn btn-sm btn-primary">Create Patient</a>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script type="text/javascript">
        function disablePatient() {
            const disableBtn = '.disable';
            const csrf = 'input[name="_token"]';
            $(disableBtn).on('click', function () {
                const that = $(this);
                const patientId = $(this).attr('data-patient-id')
                if (confirm('Do you want to enable this patient?')) {
                    const _token = $(csrf).val();
                    $.ajax({
                        method: 'post',
                        url: '/patients/'+ patientId +'/toggle-active',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        data: JSON.stringify({ active: 0, _token}),
                        success: function () {
                            $(that).removeClass('btn-success enable').addClass('disable btn-danger').text('Click to enable')
                            enablePatient()
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    })
                }
            });
        }
        function enablePatient() {
            const enableBtn = '.enable';
            const csrf = 'input[name="_token"]';
            $(enableBtn).on('click', function () {
                const that = $(this);
                const patientId = $(this).attr('data-patient-id')
                if (confirm('Do you want to enable this patient?')) {
                    const _token = $(csrf).val();
                    $.ajax({
                        method: 'post',
                        url: '/patients/'+ patientId +'/toggle-active',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        data: JSON.stringify({ active: 1, _token}),
                        success: function () {
                            $(that).removeClass('btn-danger disable').addClass('enable btn-success').text('Click to disable')
                            disablePatient()
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    })
                }
            });
        }
        $(document).ready(function () {
            disablePatient()
            enablePatient()
        });
    </script>
@endsection


