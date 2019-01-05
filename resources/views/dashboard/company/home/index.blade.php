@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col">
                @include('dashboard.company.components.sidebar')
            </div>

            <!-- Main content -->
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">

                        @if( !empty( $jobs ) && count($jobs) )
                            <!-- Job lists -->
                            <div class="card">
                                    <div class="card-header">
                                        <h4 class="float-left">List of active jobs</h4>
                                        <a href="{{ route('company.jobs.create') }}" class="btn btn-sm btn-primary float-right">Post A Job</a>
                                    </div>
                                    <div class="card-body p-0">

                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Job title</th>
                                                <th scope="col">Job type</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($jobs as $key => $job)
                                                <tr>
                                                    <th scope="row">{{ $key +1 }}</th>
                                                    <td>{{ $job->title }}</td>
                                                    <td>{{ $job->getJobType->name }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary">Show details</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                        </div>
                        @else
                            <!-- Job not found -->
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">You do not have any active jobs.</h5>
                                    <p class="card-text">Your posted job list will be here. Right now your active jobs list are empty.</p>
                                    <a href="{{ route('company.jobs.create') }}" class="btn btn-primary">Post A Job</a>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
            </div>
        </div>
    </div>
@endsection
