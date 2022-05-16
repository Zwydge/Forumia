<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Domains;
use App\Questions;
use App\Relations;
use App\Upvotes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $question = Questions::find($request->get("id", 1));
        $question->views = $question->views+1;
        $question->save();

        $question = DB::table('questions')
            ->select('questions.content', 'users.name','questions.id', 'users.avatar','questions.video_path', 'domains.label')
            ->where('questions.id', $request->get("id", 1))
            ->join('users', 'users.id', '=', 'questions.users_id')
            ->join('domains', 'domains.id', '=', 'questions.domains_id')
            ->get();

        $answers = DB::table('answers')
            ->select(DB::raw('
            count(upvotes.users_id) as votes,
            upvotes.answers_id,
            answers.questions_id,
            answers.id,
            users.name,
            users.avatar,
            answers.ans_content,
            users.id as user_id,
            answers.answer_id as answer_to'))
            ->leftJoin('users', 'users.id', '=', 'answers.users_id')
            ->leftJoin('upvotes', 'upvotes.answers_id', '=', 'answers.id')
            ->where('answers.questions_id', $request->get("id", 1))
            ->groupBy('answers.id')
            ->orderBy('votes', 'desc')
            ->get()->toArray();

        return view('pages.one_question', [
            'answers' => $answers,
            'question' => $question
        ]);
    }

    public function ask_question()
    {
        $domains = DB::table('domains')
            ->select('*')
            ->orderBy('label', 'asc')
            ->get();

        return view('pages.askquestion',['domains' => $domains]);
    }


    public function create(Request $request)
    {
        $content = $request['question'];
        $domain_id = $request['domains'];
        $question = new Questions();
        $question->domains_id = $domain_id;
        $question->users_id = Auth::id();
        $question->content = $content;

        $video = $request->file('video');

        $file = $request->video;

        $question->save();

        if(isset($video)){
            $quest_id = $question->id;
            $location = "public/media/img/questions/".$quest_id."";
            $video->move(base_path($location), $file->getClientOriginalName());
            $question->video_path = "".$quest_id."/".$file->getClientOriginalName();
            $question->save();
        }else{
            $question->video_path = "";
            $question->save();
        }

        return redirect()->route('myquestions');
    }

    public function get()
    {
        $question = Questions::all();
        return Response::json([
            'questions' => $question
        ], 200); // Status code here
    }

    public function search()
    {
        $domains = DB::table('domains')
            ->select('*')
            ->orderBy('label', 'asc')
            ->get();

        $answers = Answers::all();
        $questions = DB::table('questions')
            ->select('questions.views as views','questions.id as id', 'domains.label as label', 'questions.content as content', 'users.id as user_id','users.avatar as user_avatar', 'users.name as name')
            ->join('domains', 'domains.id', '=', 'questions.domains_id')
            ->join('users', 'users.id', '=', 'questions.users_id')
            ->get();
        return view('main.accueil',[
            'questions' => $questions,
            'domains' => $domains,
            'answers' => $answers,
            'nb'=> 0
        ]);
    }

    public function myQuestions()
    {
        $domains = DB::table('domains')
            ->select('*')
            ->orderBy('label', 'asc')
            ->get();

        $answers = Answers::all();

        $questions = DB::table('questions')
            ->select('questions.views as views', 'questions.id as id', 'domains.label as label', 'questions.content as content','users.avatar as user_avatar', 'users.id as user_id', 'users.name as name')
            ->where('questions.users_id', '=', auth()->user()->id)
            ->join('domains', 'domains.id', '=', 'questions.domains_id')
            ->join('users', 'users.id', '=', 'questions.users_id')
            ->get();

        return view('pages.myquestions',[
            'questions' => $questions,
            'domains' => $domains,
            'answers' => $answers,
            'nb'=> 0
        ]);
    }
    public function vote_add(Request $request)
    {
        $relation = new Upvotes();
        $relation->users_id = auth()->user()->id;
        $relation->answers_id = $request['id'];
        $relation->save();

        return Response::json([], 200);
    }

    public function vote_remove(Request $request)
    {
        Upvotes::where('users_id','=',auth()->user()->id)
            ->where('answers_id','=',$request['id'])
            ->delete();

        return Response::json([], 200);
    }
}
