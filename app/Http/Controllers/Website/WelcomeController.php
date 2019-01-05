<?php

namespace App\Http\Controllers\Website;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Show the website landing page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $popular_categories = Category::latest()->take(8)->get();
        $featured_jobs = Job::latest()->take(6)->get();
        $data = compact('popular_categories', 'featured_jobs');
        return view('website.welcome.index', $data);
    }
}
