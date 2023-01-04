<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class DomainController extends Controller
{
    public function index()
    {
        return view('pages.domains');
    }

    public function domains()
    {
        $domains = DB::table('domains')
            ->select(DB::raw('count(questions.id) as questions, label, SUM(questions.views) as views'))
            ->join('questions', 'questions.domains_id', '=', 'domains.id')
            ->groupBy('label')
            ->orderBy('label', 'asc')
            ->get();

        return view('pages.domains', [
            'domains' => $domains,
        ]);
    }

    public function domains_js()
    {
        $domains = DB::table('domains')
            ->select(DB::raw('label, domains.id as id'))
            ->get();

        return Response::json($domains);
    }
}
