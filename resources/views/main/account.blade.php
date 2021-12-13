@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            {{ __('My account') }}
        </div>
        <div class="container">
            <div class="col-md-6">
                {{ $role }}
            </div>
            <br>
            <form id="acount-update-form" action="{{ route('userupdate') }}" method="POST">
                <div class="col-md-6">
                    <img id="output_img_{{ Auth::user()->id }}" class="userManagement_avatar" src="{{ asset('/media/avatar/'.Auth::user()->avatar) }}">
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
                    {{ __('Mail adress : ') }}
                    <input name= "avatar" type= "file" value = "{{ Auth::user()->email }}"/>
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
