<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class JobController extends Controller
{
    
    public function index()
    {
        return Job::with('user:id,name')->latest()->get();
    }

    
    public function store(Request $request)
    {
       
        $fields = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        
        if (Auth::user()->role !== 'recruiter') {
            return response(['message' => 'You are not authorized to post jobs.'], 403); // 403 = Forbidden
        }

        
        $job = Job::create([
            'user_id' => Auth::id(), 
            'title' => $fields['title'],
            'description' => $fields['description']
        ]);

        return response($job, 201); 
    }

   
    public function show(Job $job)
    {

        return $job->load('user:id,name'); 
    }

    
    public function update(Request $request, Job $job)
    {
       
        if ($job->user_id !== Auth::id()) {
            return response(['message' => 'Unauthorized action.'], 403);
        }
        
        
        $fields = $request->validate([
            'title' => 'string',
            'description' => 'string'
        ]);

        
        $job->update($fields);
        
        return response($job, 200); 
    }

    public function destroy(Job $job)
    {

        if ($job->user_id !== Auth::id()) {
            return response(['message' => 'Unauthorized action.'], 403);
        }

        $job->delete();
        
        return response(['message' => 'Job deleted successfully.'], 200);
    }
}