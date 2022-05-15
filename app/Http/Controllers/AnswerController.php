<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        return view('pages.answers');
    }

    public function create(Request $request)
    {
        $answer = new Answers();
        $answer->ans_content = $request->get('comment_send');
        $answer->users_id = auth()->user()->id;
        $answer->questions_id = $request->get('question');
        if($request->get('answer_id'))
            $answer->answer_id = $request->get('answer_id');
        $answer->save();
        return redirect()->back();
    }
}
