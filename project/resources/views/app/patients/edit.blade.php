@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <h1 class="card-title">Edit Patient</h1>
                </div>
                <div class="col">
                    <p class="fa-pull-right"><a href="{{route('dashboard')}}" class="btn btn-sm btn-outline-dark">Go Back</a></p>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.errors')
                @if(session()->get('success'))
                    <p class="alert alert-success">{{session()->get('success')}}</p>
                @endif
                <form action="{{route('patient.update', $patient->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="firstname">First Name <sup class="text text-danger">*</sup></label>
                        <input name="first_name" type="text" class="form-control" id="firstname" value="{{$patient->first_name}}">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name </label>
                        <input name="middle_name" type="text" class="form-control" id="middlename" value="{{$patient->middle_name}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name <sup class="text text-danger">*</sup></label>
                        <input name="last_name" type="text" class="form-control" id="lastname" value="{{$patient->last_name}}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender </label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male" @if($patient->gender == 'male') selected="selected" @endif >Male</option>
                            <option value="female" @if($patient->gender == 'female') selected="selected" @endif >Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Is Active? &nbsp;</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" id="enable" @if($patient->active == '1')  checked="checked" @endif value="1">
                            <label class="form-check-label" for="enable">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" id="disable" @if($patient->active == '0')  checked="checked" @endif value="0">
                            <label class="form-check-label" for="disable">No</label>
                        </div>
                    </div>
                    <a href="{{route('dashboard')}}" class="btn btn-sm btn-default">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
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


