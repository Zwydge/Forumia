<?php

namespace App\Http\Controllers;

use App\Questions;
use Response;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function get(){
        $question = Questions::all();
        return Response::json([
            'questions' => $question
        ], 200); // Status code here
    }
}
