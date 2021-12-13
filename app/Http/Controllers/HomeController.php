<?php

namespace App\Http\Controllers;

use App\Domains;
use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $domains = Domains::all();
        $questions = DB::table('questions')
            ->join('domains', 'domains.id', '=', 'questions.domains_id')
            ->join('users', 'users.id', '=', 'questions.users_id')
            ->get();
        return view('home',[
            'questions' => $questions,
            'domains' => $domains
        ]);
    }
}
