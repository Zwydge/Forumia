<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function display(){

        $role = Roles::select()->where('id', Auth::user()->roles_id)->first();

        return view('main/account', ['role' => $role -> name]);

    }

        public function update(Request $request)
        {
            $input = $request->all();
            //$avatar = $request->file('avatar');
            $user = User::select()->where('id', Auth::user()->id)->first();
            if(isset($input['username'])){
                $user->name = $input['username'];
            }
            if(isset($input['email'])){
                $user->email = ($input['email']);
            }
            //if(isset($input['password'])){
            //    $user->password = bcrypt($input['password']);
            //}
            $file = $request->avatar;
            if(isset($avatar)){
                $location = "public/media/avatar/".Auth::user()->id."";
                File::deleteDirectory(public_path("/media/avatar/".Auth::user()->id));
                $avatar->move(base_path($location), $file->getClientOriginalName());
                $user->avatar = "".Auth::user()->id."/".$file->getClientOriginalName();
            }
            $user->save();

            $role = Roles::select()->where('id', Auth::user()->roles_id)->first();

            return view('main/account', ['role' => $role -> name]);
    }

}
