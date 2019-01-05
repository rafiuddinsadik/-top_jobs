@extends('layouts.app')

@section('content')

    <!-- Job Details Header -->
    <div class="jumbotron text-center">
        <h1 class="display-3">{{ $job->title }}</h1>
        <ul class="list-inline">
            <li class="list-inline-item">
                <button type="button" class="btn btn-outline-danger">{{ $job->getJobType->name }}</button>
            </li>
            <li class="list-inline-item">{{ $job->job_location }}</li>
            <li class="list-inline-item">{{ $job->created_at->diffForHumans() }}</li>
        </ul>
    </div>


    <div class="container pt-4">

        <div class="row">

            <!-- Left Side -->
            <div class="col-sm-8">

                <div class="media">
                    <img class="mr-3" src="https://via.placeholder.com/64" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">
                            {{ $job->title }}
                        </h5>
                        <p>
                            <ul class="list-inline">
                                <li class="list-inline-item">Website.com</li>
                                <li class="list-inline-item">01XXXXXXX</li>
                                <li class="list-inline-item">jhondoe@email.com</li>
                            </ul>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Right Side -->
            <div class="col-sm-4">

                <!-- Apply now button -->
                <div class="apply_button_wrapper">

                    <p>
                        <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#btnApplyNow" aria-expanded="false" aria-controls="btnApplyNow">
                            Apply now
                        </button>
                    </p>
                    <div class="collapse" id="btnApplyNow">
                        <div class="card card-body">

                            <div>To apply for this job email your details to Goxoft@demo.com</div>

                            <hr>

                            <div>
                                You can apply to this job and others using your online resume. Click the link below to submit your online resume and email your application to this employer.
                            </div>

                            <hr>

                            <div>
                                <a href="{{ route('candidate.apply-job-form', $job->id) }}" class="btn btn-outline-primary btn-block">
                                    Upload your CV and Apply
                                </a>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
@endsection