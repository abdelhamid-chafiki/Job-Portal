<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Load JSON file
        $json = File::get(database_path('seeders/data/jobs.json'));

        // Convert JSON to array
        $jobs = json_decode($json, true);

        // Insert jobs into database
        foreach ($jobs as $job) {
            DB::table('jobs')->insert([
                'title'       => $job['title'],
                'location'    => $job['location'],
                'level'       => $job['level'],
                'company_id'  => $job['company_id'],
                'description' => $job['description'],
                'salary'      => $job['salary'],
                'category'    => $job['category'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
