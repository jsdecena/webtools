@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <h1 class="card-title">Create Patient</h1>
                </div>
                <div class="col">
                    <p class="fa-pull-right"><a href="{{route('dashboard')}}" class="btn btn-sm btn-outline-dark">Go Back</a></p>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.errors')
                <form action="{{route('patient.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="firstname">First Name <sup class="text text-danger">*</sup></label>
                        <input name="first_name" type="text" class="form-control" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name </label>
                        <input name="middle_name" type="text" class="form-control" id="middlename">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name <sup class="text text-danger">*</sup></label>
                        <input name="last_name" type="text" class="form-control" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender </label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Is Active? &nbsp;</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" id="enable" checked="checked" value="1">
                            <label class="form-check-label" for="enable">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="active" id="disable" value="0">
                            <label class="form-check-label" for="disable">No</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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


