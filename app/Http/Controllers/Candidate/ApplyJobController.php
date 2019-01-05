<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplyJobController extends Controller
{
    public function showJobApplyForm(Request $request, $job_id)
    {
        // Find the job using the given job id or fail
        $job = Job::findOrFail($job_id);

        // Check the employer is already applied for this job. if yes then show an notice message
        $job_application = JobApplication::where([ 'user_id' => auth()->id(), 'job_id' => $job_id ])->count();

        if($job_application){
            flash()->overlay("Sorry! you have already applied for this job.");
            return redirect()->back();
        }

        $compact = compact('job');
        return view('dashboard.candidate.jobs.apply-job-form', $compact);
    }

    public function postJobApplyForm(Request $request, $job_id)
    {
        // Find the job using the given job id or fail
        $job = Job::findOrFail($job_id);

        // Check the employer is already applied for this job. if yes then show an notice message
        $job_application = JobApplication::where([ 'user_id' => auth()->id(), 'job_id' => $job_id ])->count();

        if($job_application){
            flash()->overlay("Sorry! you have already applied for this job.");
            return redirect()->back();
        }

        $apply_type = 0;

        if ($request->hasFile('cv_file')) {
            $apply_type = 2;
            $cv_upload_path = $request->cv_file->store('candidate_cv');
        }

        // Store the Job Application Data
        $job_application = JobApplication::create([
            'user_id' => auth()->id(),
            'job_id' => $job_id,
            'apply_type' => $apply_type,
            'cover_latter' => $request->cover_latter,
            'cv_file' => $cv_upload_path,
        ]);

        flash()->overlay("Your Application sent to the employer. Wait for their response.");
        return redirect()->home();
    }
}
