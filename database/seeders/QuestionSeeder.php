<?php

namespace Database\Seeders;

use App\Models\Quiz\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $subjectId = rand(1, 50);
            Question::create([
                'subject_id' => $subjectId,
                'question_text' => 'Question ' . $i . ' for Subject ' . $subjectId
            ]);
        }
    }
}
