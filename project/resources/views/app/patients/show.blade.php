@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('img/user4-128x128.jpg')}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$patient->full_name}}</h3>

                            <p class="text-muted text-center">{{$patient->gender}}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-muted">
                                First Name: {{$patient->first_name}} <br/>
                                Middle Name: {{$patient->middle_name}} <br/>
                                Last Name: {{$patient->last_name}} <br/>
                                Gender: {{$patient->gender}}
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <a href="{{route('dashboard')}}" class="btn btn-dark">Home</a>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="tab-pane active" id="timeline">
                                    <!-- The timeline -->
                                    @foreach($notes as $note)
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                    {{$note->created_at->toDayDateTimeString()}}
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> {{$note->created_at->diffForHumans()}}</span>

                                                    <h3 class="timeline-header"><a href="#">Dr. {{$note->doctor->name}}</a> written a note</h3>

                                                    <div class="timeline-body">
                                                        {{$note->description}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@endsection


