<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job; 
use App\Models\Application; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ApplicationController extends Controller
{
    
    public function store(Request $request, Job $job)
    {
        
        if (Auth::user()->role !== 'applicant') {
            return response(['message' => 'Only applicants can apply for jobs.'], 403); 
        }

       
        $existingApplication = Application::where('user_id', Auth::id())
                                          ->where('job_id', $job->id)
                                          ->first();

        if ($existingApplication) {
            return response(['message' => 'You have already applied for this job.'], 409); 
        }

        $application = Application::create([
            'user_id' => Auth::id(), 
            'job_id' => $job->id,
        ]);

        return response($application->load(['user:id,name,email', 'job:id,title,location']), 201); 
    }

    public function getJobApplicants(Job $job)
    {
        if ($job->user_id !== Auth::id()) {
            return response(['message' => 'Unauthorized'], 403);
        }

        $applicants = Application::where('job_id', $job->id)->with('user:id,name,email')->get();
        return response($applicants, 200);
    }

    public function getUserApplications($userId)
    {
        if ($userId != Auth::id()) {
            return response(['message' => 'Unauthorized'], 403);
        }

        $applications = Application::where('user_id', $userId)->with(['job:id,title,location', 'job.category:id,name'])->get();
        return response($applications, 200);
    }
}