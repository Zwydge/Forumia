@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            {{ __('My account') }}
        </div>
        <div class="container">
            <div class="col-md-6">
                <img id="output_img_{{ Auth::user()->id }}" class="userManagement_avatar" src="{{ asset('/media/img/avatar/'.Auth::user()->avatar) }}">
                {{ $role }}
            </div>
            <br>
            <form id="acount-update-form" action="{{ route('userupdate') }}" method="POST">
                <div class="col-md-6">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    <img id="output_img_{{ Auth::user()->id }}" class="userManagement_avatar" src="{{ asset('/media/avatar/'.Auth::user()->avatar) }}">
=======
>>>>>>> 8920e49 (account management page creation and data update)
=======
>>>>>>> 543d51d (account management page creation and data update)
=======


>>>>>>> ea148fc (minor fix on avatar uploading)
                    {{ __('Username : ') }}
            <input name= "username" value = "{{ Auth::user()->name }}"/>
                </div>
                <br>
                    <div class="col-md-6">
                        {{ __('Mail adress : ') }}
                <input name= "email" value = "{{ Auth::user()->email }}"/>
                    </div>
                <br>
                <div class="col-md-6">
                    Avatar: <label for="song_image">
                        <img id="output_img" class="avatar_img" src="{{ asset('/media/img/avatar/0/user.png') }}">
                    </label>
                    <input name="avatar" id="avatar_image" type="file" class="hide_input image_song" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('output_img').src = window.URL.createObjectURL(this.files[0])">
                </div>

                <a type="submit" class="btn btn-primary"
                   onclick="event.preventDefault();
                                    document.getElementById('acount-form').submit();
                                    document.getElementById('acount-update-form').submit();">
                    {{ __('save') }}
                </a>

                    <form id="acount-form" action="{{ route('userupdate') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </form>
            <br>
            <a type="submit" class="btn btn-primary">
                {{ __('Reset password') }}
            </a>
        </div>

        </div>
    </div>
@endsection
