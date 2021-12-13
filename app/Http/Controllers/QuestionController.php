<?php

namespace App\Http\Controllers;

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
}
