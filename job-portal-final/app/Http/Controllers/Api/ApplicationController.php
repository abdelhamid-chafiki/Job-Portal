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

        // 3. كريي الـ Application
        $application = Application::create([
            'user_id' => Auth::id(), 
            'job_id' => $job->id,
        ]);

        return response($application, 201); 
    }
}