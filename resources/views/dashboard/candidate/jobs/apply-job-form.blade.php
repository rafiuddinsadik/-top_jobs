@extends('layouts.app')

@section('content')
    <div class="container pt-4">

        <!-- Apply job Form -->
        <form action="{{ route('candidate.apply-job-form.post', $job->id) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="cv_file">Upload your CV</label>
                <input type="file" class="form-control-file" id="cv_file" name="cv_file">
            </div>

            <div class="form-group">
                <label for="cover_latter">Cover latter (optional)</label>
                <textarea name="cover_latter" class="form-control" cols="30" rows="10" placeholder="Write something about you."></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Apply & submit CV</button>
            </div>

        </form>

    </div>
@endsection