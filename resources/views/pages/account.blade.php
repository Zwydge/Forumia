@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Mon compte
        </div>
        <form class="form-account" enctype="multipart/form-data" action="{{route('update-account')}}" method="POST">
            @csrf
            <input required class="username" name="username" value="{{auth()->user()->name}}" placeholder="Pseudonyme" type="text">
            <input required class="email" name="email" value="{{auth()->user()->email}}" placeholder="E-mail" type="email">
            <label class="label_file" id="label_img" for="avatar">
                <img id="ouput_img" src="{{ asset("media/img/avatar/".auth()->user()->avatar) }}" alt="avatar">
            </label>
            <input onchange="document.getElementById('ouput_img').src = window.URL.createObjectURL(this.files[0])" id="avatar" accept="image/*" name="avatar" type="file">
            <input value="Mettre à jour" type="submit">
        </form>
    </div>
@endsection
