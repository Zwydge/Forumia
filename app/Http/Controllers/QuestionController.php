<?php

namespace App\Http\Controllers;

use App\Domains;
use App\Questions;
use Illuminate\Support\Facades\Auth;
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
        $question = Questions::findOrFail($request->get("id", 1));
        return view('pages.one_question', [
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
