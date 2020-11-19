@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">

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
                @if($patients)
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
                            <td>{{$patient->full_name}}</td>
                            <td>{{$patient->gender}}</td>
                            <td>
                                @if($patient->active == 1)
                                    <button class="btn btn-sm btn-success">Enabled</button>
                                @else
                                    <button class="btn btn-sm btn-danger">Disabled</button>
                                @endif
                            </td>
                            <td>
                                <p class="fa-pull-right">
                                    <a href="{{route('patient.show', $patient->id)}}" class="btn btn-sm btn-dark">View</a>
                                    <a href="{{route('patient.edit', $patient->id)}}" class="btn btn-sm btn-info">Edit</a>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <p class="alert alert-warning">No patient created yet ...</p>
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


