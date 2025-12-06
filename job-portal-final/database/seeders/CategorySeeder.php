<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $categories = [
        ['name' => 'IT & Development', 'icon' => 'fa-laptop-code'],
        ['name' => 'Design & Creative', 'icon' => 'fa-palette'],
        ['name' => 'Marketing & Sales', 'icon' => 'fa-bullhorn'],
        ['name' => 'Finance', 'icon' => 'fa-chart-line'],
        ['name' => 'Human Resources', 'icon' => 'fa-users'],
    ];

    foreach ($categories as $cat) {
        Category::create($cat);
    }
}
}
