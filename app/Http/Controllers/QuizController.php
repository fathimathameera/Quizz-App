<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;

class QuizController extends Controller
{
    public function index()
    {
        $user = User::find(session()->get('loginId'));
        $questions = Question::with('choices')->get()->toArray();
        foreach($questions as $question) {
            $data[] = [
                'question' => $question['question'],
                'choice1' => $question['choices'][0]['choice'],
                'choice2' => $question['choices'][1]['choice'],
                'choice3' => $question['choices'][2]['choice'],
                'choice4' => $question['choices'][3]['choice'],
            ];

            foreach($question['choices'] as $choice) {
                if($choice['is_answer'] == 1) {
                    $correctAnswers[] = $choice['choice'];
                }
            }
        }
        return view('quiz', ['user' => $user, 'questions' => $data, 'correct_answers' => $correctAnswers]);
    }

    public function saveScores()
    {
        $score = new Score;
        $score->score = request('score');
        $score->user_id = session()->get('loginId');
        $score->save();
        $highScore = Score::max('score');
        return view('score', ['score' => $score, 'highscore' => $highScore]);
    }

    public function listScores()
    {
        $scores = Score::where('user_id', '=', session()->get('loginId'))->get();
        return view('score_list', ['scores' => $scores]);
    }
}
