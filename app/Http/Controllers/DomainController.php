<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        return view('pages.domains');
    }

    public function my_domains()
    {
        return view('pages.mydomains');
    }

}
