<?php

namespace Database\Seeders;

use App\Models\Quiz\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $questionId = rand(1, 50);
            Option::create([
                'question_id' => $questionId,
                'option_text' => 'Option ' . $i . ' for Question ' . $questionId,
                'is_correct' => rand(0, 1) == 1 ? true : false
            ]);
        }
    }
}
