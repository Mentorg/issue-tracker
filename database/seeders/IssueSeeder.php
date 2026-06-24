<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Issue::factory()
            ->count(30)
            ->create([
                'project_id' => fn () => Project::inRandomOrder()->value('id'),
            ]);
    }
}
