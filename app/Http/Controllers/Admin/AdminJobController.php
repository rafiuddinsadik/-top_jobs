<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminJobController extends Controller
{
    /**
     * Show the all posted jobs list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::latest()->where([ 'recent_status' => 0 ])->get();
        $compact = compact('jobs');
        return view('dashboard.admin.posted-jobs.index', $compact);
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update([
            'recent_status' =>  $request->status
        ]);
        return redirect()->route('admin.jobs.index');
    }
}
