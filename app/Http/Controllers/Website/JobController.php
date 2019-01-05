<?php

namespace App\Http\Controllers\Website;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function show(Request $request, $job_id)
    {
        $job = Job::findOrfail($job_id);
        $compact = compact('job');
        return view('website.jobs.show-job-details', $compact);
    }
}
