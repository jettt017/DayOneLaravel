<?php

namespace App\Http\Controllers;

use App\Ai\Agents\QuizAgent;
use App\Models\Note;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::query()
            ->with('note')
            ->whereHas(
                'note',
                fn ($query) => $query->where(
                    'user_id',
                    session('user_id')
                )
            )
            ->latest()
            ->get();

        return view('quiz.index', [
            'quizzes' => $quizzes,
        ]);
    }

    public function show($id)
    {
        $quiz = Quiz::query()
            ->whereHas(
                'note',
                fn ($query) => $query->where(
                    'user_id',
                    session('user_id')
                )
            )
            ->findOrFail($id);

        return view('quiz.show', [
            'note' => $quiz->note,
            'quiz' => $quiz,
        ]);
    }

    public function generate($id)
    {
        $note = Note::query()
            ->where('user_id', session('user_id'))
            ->findOrFail($id);

        $response = QuizAgent::make()->prompt(
            $note->content
        );

        $quiz = Quiz::create([
            'note_id' => $note->id,
            'questions' => $response['questions'],
        ]);

        return redirect()->route(
            'quiz.show',
            $quiz->id
        );
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::query()
            ->whereHas(
                'note',
                fn ($query) => $query->where(
                    'user_id',
                    session('user_id')
                )
            )
            ->findOrFail($id);

        $score = 0;
        $results = [];

        foreach ($quiz->questions as $index => $question) {

            $userAnswer = $request->answers[$index] ?? null;

            $isCorrect =
                $userAnswer === $question['answer'];

            if ($isCorrect) {
                $score++;
            }

            $results[] = [
                'question' => $question['question'],
                'user_answer' => $userAnswer,
                'correct_answer' => $question['answer'],
                'is_correct' => $isCorrect,
            ];
        }

        return view('quiz.result', [
            'score' => $score,
            'total' => count($quiz->questions),
            'results' => $results,
        ]);
    }
}
