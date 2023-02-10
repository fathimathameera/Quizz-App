<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionChoice;

class QuestionChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionChoice::create([
            'choice' => '2',
            'question_id' => 1,
        ]);

        QuestionChoice::create([
            'choice' => '4',
            'question_id' => 1,
        ]);

        QuestionChoice::create([
            'choice' => '8',
            'is_answer' => 1,
            'question_id' => 1,
        ]);

        QuestionChoice::create([
            'choice' => '20',
            'question_id' => 1,
        ]);

        QuestionChoice::create([
            'choice' => 'egg',
            'is_answer' => 1,
            'question_id' => 2,
        ]);

        QuestionChoice::create([
            'choice' => 'chicken',
            'question_id' => 2,
        ]);

        QuestionChoice::create([
            'choice' => 'noodle',
            'question_id' => 2,
        ]);

        QuestionChoice::create([
            'choice' => 'spinach',
            'question_id' => 2,
        ]);

        QuestionChoice::create([
            'choice' => 'buenos aires',
            'is_answer' => 1,
            'question_id' => 3,
        ]);

        QuestionChoice::create([
            'choice' => 'ankara',
            'question_id' => 3,
        ]);

        QuestionChoice::create([
            'choice' => 'rio de janeiro',
            'question_id' => 3,
        ]);

        QuestionChoice::create([
            'choice' => 'santiago',
            'question_id' => 3,
        ]);

        QuestionChoice::create([
            'choice' => 'solid',
            'question_id' => 4,
        ]);

        QuestionChoice::create([
            'choice' => 'liquid',
            'question_id' => 4,
        ]);

        QuestionChoice::create([
            'choice' => 'gas',
            'question_id' => 4,
        ]);

        QuestionChoice::create([
            'choice' => 'water',
            'is_answer' => 1,
            'question_id' => 4,
        ]);

        QuestionChoice::create([
            'choice' => 'lumina spark',
            'question_id' => 5,
        ]);

        QuestionChoice::create([
            'choice' => 'lumina science',
            'is_answer' => 1,
            'question_id' => 5,
        ]);

        QuestionChoice::create([
            'choice' => 'lumina leader',
            'question_id' => 5,
        ]);

        QuestionChoice::create([
            'choice' => 'lumina sales',
            'question_id' => 5,
        ]);


    }
}
