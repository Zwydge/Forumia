@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            {{ __('My account') }}
        </div>
        <div class="container">
            <div class="col-md-6">
<<<<<<< HEAD
                <img id="output_img_{{ Auth::user()->id }}" class="userManagement_avatar" src="{{ asset('/media/img/avatar/'.Auth::user()->avatar) }}">
=======
<<<<<<< HEAD
                <img id="output_img_{{ Auth::user()->id }}" class="userManagement_avatar" src="{{ asset('/media/img/avatar/'.Auth::user()->avatar) }}">
=======
>>>>>>> 8920e49 (account management page creation and data update)
>>>>>>> 8941bb2733aa58a88ad7dcff5af2d17244cc0420
                {{ $role }}
            </div>
            <br>
            <form id="acount-update-form" action="{{ route('userupdate') }}" method="POST">
                <div class="col-md-6">
<<<<<<< HEAD
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
            <input name= "username" value = "{{ $name }}"/>
=======


=======
                    <img id="output_img_{{ Auth::user()->id }}" class="userManagement_avatar" src="{{ asset('/media/avatar/'.Auth::user()->avatar) }}">
>>>>>>> f0142e3 (avatar support and minor fix)
                    {{ __('Username : ') }}
            <input name= "username" value = "{{ $name }}"/>
=======
                    {{ __('Username : ') }}
            <input name= "username" value = "{{ Auth::user()->name }}"/>
>>>>>>> 8920e49 (account management page creation and data update)
>>>>>>> 8941bb2733aa58a88ad7dcff5af2d17244cc0420
                </div>
                <br>
                    <div class="col-md-6">
                        {{ __('Mail adress : ') }}
                <input name= "email" value = "{{ Auth::user()->email }}"/>
                    </div>
                <br>
                <div class="col-md-6">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8941bb2733aa58a88ad7dcff5af2d17244cc0420
                    Avatar: <label for="song_image">
                        <img id="output_img" class="avatar_img" src="{{ asset('/media/img/avatar/0/user.png') }}">
                    </label>
                    <input name="avatar" id="avatar_image" type="file" class="hide_input image_song" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('output_img').src = window.URL.createObjectURL(this.files[0])">
<<<<<<< HEAD
=======
=======
                    {{ __('Mail adress : ') }}
                    <input name= "avatar" type= "file" value = "{{ Auth::user()->email }}"/>
>>>>>>> 8920e49 (account management page creation and data update)
>>>>>>> 8941bb2733aa58a88ad7dcff5af2d17244cc0420
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
