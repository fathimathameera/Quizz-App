<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'question' => 'How many legs/tentacles does an Octopus have?',
        ]);

        Question::create([
            'question' => 'What is the main ingredient of an Omlette?',
        ]);

        Question::create([
            'question' => 'What is the capital of Argentina?',
        ]);

        Question::create([
            'question' => 'Which one of the following that is not a state of matter?',
        ]);

        Question::create([
            'question' => 'Which one of the following that is not a Lumina Learning product?',
        ]);
    }
}
