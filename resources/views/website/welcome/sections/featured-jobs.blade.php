<section class="section-featured-jobs pt-3">
    <div class="container">

        <!-- Section Header -->
        <h2 class="text-center">Featured jobs</h2>

        @if( !empty($featured_jobs) && count($featured_jobs) )
            <!-- Featured Jobs List -->
            <div class="featured-job-list-wrapper">
                @foreach($featured_jobs as $featured_job)
                    @if($featured_job->recent_status == 1)
                        <div class="media">
                            <img class="mr-3" src="https://via.placeholder.com/64" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <a href="{{ route('website.jobs.details', $featured_job->id) }}">
                                        {{ $featured_job->title }}
                                    </a>
                                </h5>
                                <p>Company XYZ</p>
                                <p>{{ $featured_job->job_location }}</p>
                            </div>
                            <div>
                                <a href="#" class="btn btn-sm btn-primary">{{ $featured_job->getJobType->name }}</a>
                                <br>
                                <span class="text-muted">{{ $featured_job->updated_atgi->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <!-- Featured Job not found -->
            @component('layouts.components.alert', [ 'type' => 'danger', 'message' => 'Sorry! Featured job not found.' ])
            @endcomponent
        @endif


    </div>
</section>