@extends('layouts.dashboard')

@section('main-content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title float-left">All Available Job Categories</h2>
                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#addCategory">
                            Add New
                        </button>

                        <!-- Add Category Modal -->
                        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Job Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('job-categories.store')}}">
                                            {{{csrf_field()}}}
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="category_name" placeholder="Category Name">
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
                                        Category Name
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
                                @if(!empty($job_categories) && count($job_categories))
                                    @foreach($job_categories as $count => $job_category)
                                    <tr>
                                            <td class="font-weight-medium">
                                                {{$count+1}}
                                            </td>
                                            <td>
                                                {{$job_category->name}}
                                            </td>
                                            <td>
                                                {{\App\Models\JobCategory::all()->where('category_id', $job_category->id)->count()}}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning delete-company" data-toggle="modal" data-target="#deleteModal" data-id="{{ $job_category->id }}" data-url="{{ url('job-categories.update', $job_category->id) }}">
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
                                                                    <p><b>Current Name: </b>{{$job_category->name}}</p>
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
                                                <form action="{{route('job-categories.destroy', ['id' => $job_category->id])}}" method="POST">
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

@push('stack')
    <script>

        $(document).ready(function () {
            // For A Delete Record Popup
            $('.delete-company').click(function () {
                var id = $(this).attr('data-id');
                var url = $(this).attr('data-url');

                $("#deleteForm", 'input').val(id);
                $("#deleteForm").attr("action", url);
            });
        });

    </script>
@endpush