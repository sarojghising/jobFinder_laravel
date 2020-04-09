<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use App\Models\Job;
class JobController extends Controller
{
    protected $job = null;
    public function __construct(Job $job)
    {
        $this->job = $job;
    }
    public function index()
    {
        $jobs = $this->job->getAllJobs();
        return view('welcome')->with('jobs',$jobs);
    }
    public function show($id,Job $slug)
    {
       return view('jobs.show')->with('job',$slug);
    }
}
