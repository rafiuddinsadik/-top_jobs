<?php

namespace App\Http\Controllers\Company;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function showJobCreateForm()
    {
        $job_types = JobType::all();
        $categories = Category::all();
        $compact = compact('job_types', 'categories');
        return view('dashboard.company.jobs.create', $compact);
    }

    public function postJobCreateForm(Request $request)
    {
        // Validate the Job Post Form

        // Create the Job
        $job = Job::create([
            'user_id' => auth()->id(),
            'title' => $request->job_title,
            'job_location' => $request->job_location,
            'job_type' => $request->job_type,
            'job_description' => $request->job_description
        ]);

        // Create the Job Categories
        if($request->has('job_categories') && !empty($request->job_categories) && is_array($request->job_categories)){
            foreach($request->job_categories as $category_id){
                JobCategory::create([ 'job_id' => $job->id, 'category_id' => $category_id ]);
            }
        }

        flash()->overlay('Your job has been posted and now under admin review.', 'Job posted success');
        return redirect()->back();
    }
}
