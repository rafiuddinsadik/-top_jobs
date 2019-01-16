@extends('layouts.dashboard')

@section('main-content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title float-left">All Available Job Types</h2>
                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#addCategory">
                            Add New
                        </button>

                        <!-- Add type Modal -->
                        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Job Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('job-types.store')}}">
                                            {{{csrf_field()}}}
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="type_name" placeholder="Type Name">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pt-2">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Type Name
                                    </th>
                                    <th>
                                        Total Used
                                    </th>
                                    <th>
                                        Update
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($job_types) && count($job_types))
                                    @foreach($job_types as $count => $job_type)
                                        <tr>
                                            <td class="font-weight-medium">
                                                {{$count+1}}
                                            </td>
                                            <td>
                                                {{$job_type->name}}
                                            </td>
                                            <td>
                                                {{\App\Models\Job::all()->where('job_type', $job_type->id)->count()}}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning delete-company" data-toggle="modal" data-target="#deleteModal" data-id="{{ $job_type->id }}" data-url="{{ url('job-categories.update', $job_type->id) }}">
                                                    Update
                                                </a>
                                                <!-- Update Category Modal -->
                                                <form action="" method="post" id="deleteForm">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="">
                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><b>Current Name: </b>{{$job_type->name}}</p>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route('job-types.destroy', ['id' => $job_type->id])}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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