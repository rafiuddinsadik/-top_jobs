@extends('layouts.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    @endpush

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col">
                @include('dashboard.company.components.sidebar')
            </div>

            <!-- Main content -->
            <div class="col-9">

                <!-- Form - Job post -->
                @include('dashboard.company.jobs.forms.form-job-create')
                <!-- End Form - Job post -->

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        // Initialize the select 2 Plugin
        $('.select').select2();
    </script>
@endpush