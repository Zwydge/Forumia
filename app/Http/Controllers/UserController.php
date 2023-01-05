<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Domains;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Response;
use Storage;

class UserController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function display()
    {
        return view('main/accueil');
    }

    public function my_account()
    {
        return view('pages.account', []);
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->password = bcrypt($request->get('password'));
        $user->email = $request->get('email');
        $user->name = $request->get('pseudo');
        $user->roles_id = 1;
        $user->save();

        return Response::json([], 200);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->get('username');
        $user->email = $request->get('email');
        $avatar = $request->file('avatar');

        $file = $request->avatar;

        if (isset($avatar)) {
            $location = "public/media/img/avatar/" . Auth::user()->id . "";
            File::deleteDirectory(public_path("/media/img/avatar/" . Auth::user()->id));
            $avatar->move(base_path($location), $file->getClientOriginalName());
            $user->avatar = "" . Auth::user()->id . "/" . $file->getClientOriginalName();
        }

        $user->save();
        return redirect()->route('account');
    }

    public function users_js()
    {
        $id = Auth::id();
        $result = User::where('id', '!=', $id)->get();

        return Response::json($result);
    }
}
