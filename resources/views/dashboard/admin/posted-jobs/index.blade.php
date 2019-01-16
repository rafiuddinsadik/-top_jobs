@extends('layouts.dashboard')

@section('main-content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">All pending jobs</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Company name
                                    </th>
                                    <th>
                                        Job Category
                                    </th>
                                    <th>
                                        Job Title
                                    </th>
                                    <th>
                                        Package
                                    </th>
                                    <th>
                                        Deadline
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if( !empty($jobs) && count($jobs) )
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td class="font-weight-medium">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $job->user->name }}
                                            </td>
                                            <td>
                                                @foreach($job->categories()->get() as $job_category)
                                                    <span class="badge badge-dark">{{ $job_category->category->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $job->title }}
                                            </td>
                                            <td>
                                                Basic
                                            </td>
                                            <td>
                                                May 15, 2015
                                            </td>
                                            <td>
                                                <a href="{{route('admin.jobs.details', [$job->id])}}" class="btn btn-sm btn-success">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">No data found.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection