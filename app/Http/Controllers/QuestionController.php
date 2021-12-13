<?php

namespace App\Http\Controllers;

use App\Questions;
use Response;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('pages.questions');
    }

    public function one_question()
    {
        return view('pages.one_question');
    }

    public function ask_question()
    {
        return view('pages.askquestion');
    }

    public function my_questions()
    {
        return view('pages.myquestions');
    }

    public function get()
    {
        $question = Questions::all();
        return Response::json([
            'questions' => $question
        ], 200); // Status code here
    }
}
