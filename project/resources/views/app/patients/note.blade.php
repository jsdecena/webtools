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
                <form action="{{route('patient.note.store', $patient->id)}}" method="post">
                    {{csrf_field()}}
                    <p>Add a note for: <strong>{{$patient->full_name}}</strong></p> <br>
                    <p>Your note description: </p>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea> <br>
                    <a href="{{route('dashboard')}}" class="btn btn-sm btn-default">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
