<?php

namespace Database\Seeders;

use App\Models\Quiz\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            Subject::create(['name' => 'Subject ' . $i]);
        }
    }
}
