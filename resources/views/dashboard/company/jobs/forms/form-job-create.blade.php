<form action="{{ route('company.jobs.store') }}" method="POST" id="form_job_create">

    {{ csrf_field() }}

    <!-- Job Title -->
    <div class="form-group">
        <label>Job title</label>
        <input type="text" name="job_title" class="form-control">
    </div>

    <!-- Location, Job Types, Categories -->
    <div class="row">
        <!-- Location -->
        <div class="col">
            <div class="form-group">
                <label>Location (<small>optional</small>)</label>
                <input type="text" name="job_location" class="form-control" placeholder="e.g: London">
            </div>
        </div>

        <!-- Job Types -->
        <div class="col">
            <div class="form-group">
                <label>Job type</label>
                @if(!empty($categories) && count($job_types))
                    <select name="job_type" id="job_type" class="form-control">
                        @foreach($job_types as $job_type)
                            <option value="{{ $job_type->id }}">{{ $job_type->name }}</option>
                        @endforeach
                    </select>
                @else
                    <div class="alert alert-danger">Sorry! not category found.</div>
                @endif
            </div>
        </div>

        <!-- Categories -->
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Job category</label>
                @if(!empty($categories))
                    <select name="job_categories[]" class="form-control select" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                @else
                    <div class="alert alert-danger">Sorry! not category found.</div>
                @endif
            </div>
        </div>
    </div>

    <!-- Salaries, Career labels, experiences -->
    {{--<div class="row">--}}
        {{--<!-- Salaries -->--}}
        {{--<div class="col">--}}
            {{--<div class="form-group">--}}
                {{--<label>Job Salary (<small>optional</small>)</label>--}}
                {{--<select name="job_salaries[]" class="form-control select" multiple>--}}
                    {{--<option value="5">Freelance</option>--}}
                    {{--<option value="6">Internship</option>--}}
                    {{--<option value="3">Part Time</option>--}}
                    {{--<option value="4">Temporary</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!-- Career labels -->--}}
        {{--<div class="col">--}}
            {{--<div class="form-group">--}}
                {{--<label>Job Career Level (<small>optional</small>)</label>--}}
                {{--<select name="job_career_labels[]" class="form-control select" multiple>--}}
                    {{--<option value="5">Freelance</option>--}}
                    {{--<option value="6">Internship</option>--}}
                    {{--<option value="3">Part Time</option>--}}
                    {{--<option value="4">Temporary</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!-- experiences -->--}}
        {{--<div class="col">--}}
            {{--<div class="form-group">--}}
                {{--<label>Job Experience (<small>optional</small>)</label>--}}
                {{--<select name="job_experiences[]" class="form-control select" multiple>--}}
                    {{--<option value="5">Freelance</option>--}}
                    {{--<option value="6">Internship</option>--}}
                    {{--<option value="3">Part Time</option>--}}
                    {{--<option value="4">Temporary</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- Job Description -->
    <div class="form-group">
        <label>Job Description</label>
        <textarea name="job_description" class="form-control"></textarea>
    </div>

    <!-- Submit Button -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Post job</button>
    </div>

</form>