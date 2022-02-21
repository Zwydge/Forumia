<?php

namespace App\Http\Controllers;

use App\Domains;
use App\Questions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('pages.questions');
    }

    public function one_question(Request $request)
    {
        $question = DB::table('questions')
            ->select('questions.content', 'users.name', 'domains.label')
            ->where('questions.id', $request->get("id", 1))
            ->join('users', 'users.id', '=', 'questions.users_id')
            ->join('domains', 'domains.id', '=', 'questions.domains_id')
            ->get();

        $answers = DB::table('answers')
            ->select('answers.id', 'users.name', 'answers.ans_content', 'users.id as user_id', 'answers.answer_id as answer_to')
            ->where('questions_id', $request->get("id", 1))
            ->join('questions', 'questions.id', '=', 'answers.questions_id')
            ->join('users', 'users.id', '=', 'answers.users_id')
            ->get();

        return view('pages.one_question', [
            'answers' => $answers,
            'question' => $question
        ]);
    }

    public function ask_question()
    {
        $domains = Domains::all();
        return view('pages.askquestion',['domains' => $domains]);
    }

    public function my_questions()
    {
        return view('pages.myquestions');
    }

    public function create(Request $request)
    {
        $content = $request['question'];
        $domain_id = $request['domains'];
        $question = new Questions();
        $question->domains_id = $domain_id;
        $question->users_id = Auth::id();
        $question->content = $content;
        $question->video_path = "path";
        $question->save();
        return redirect()->route('myquestions');
    }

    public function get()
    {
        $question = Questions::all();
        return Response::json([
            'questions' => $question
        ], 200); // Status code here
    }
}
