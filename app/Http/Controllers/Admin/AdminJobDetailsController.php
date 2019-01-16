<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminJobDetailsController extends Controller
{
    public function show(Request $request, $id){
        $job = Job::findOrFail($id);
        $compact = compact('job');
        return view('dashboard.admin.posted-jobs.details', $compact);
    }
}
