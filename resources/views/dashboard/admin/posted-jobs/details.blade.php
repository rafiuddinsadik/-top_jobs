@extends('layouts.dashboard')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @endpush

@section('main-content')

    <div class="p-1">
        <form action="{{route('admin.jobs.update', [$job->id])}}" method="post">
        {{csrf_field()}}
        <button name="status" value="1" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>Approve</button>
        <button name="status" value="2" class="btn btn-danger float-right"><i class="fa fa-trash"></i>Trash</button>
        </form>
    </div>
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

    </div>
@endsection