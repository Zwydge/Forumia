@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Nouvelle question
        </div>
        <div class="container_search_bar">
            <form id="ask-form" enctype="multipart/form-data" action="{{ route('createquest') }}" method="POST">
                @csrf
                <textarea required placeholder="{{ __('Posez votre question') }}" name="question" class="search_bar" type="text"></textarea>
                <div class="title_video">Joindre une vidéo à ma question (facultatif)</div>
                <div class="video_part">
                    <label class="label_video" id="label_video" for="video">
                        <img src="{{asset("media/img/tech/add-video.png")}}" alt="add video">
                    </label>
                    <video controls id="video_upload" src=""></video>
                </div>
                <input onchange="document.getElementById('video_upload').src = window.URL.createObjectURL(this.files[0])" name="video" accept="video/*" id="video" type="file">
                <div class="title_video">Associer ma question à un domaine</div>
                <div class="checkbox_domains">
                    @foreach($domains as $domain)
                        <input type="radio" name="domains" value="{{ $domain->id }}" id="domain_{{ $domain->id }}">
                        <label class="label_{{ $domain->id }}" for="domain_{{ $domain->id }}">{{ $domain->label }}</label>
                    @endforeach
                </div>
                <div class="validation">
                    <input value="Valider" id="check_question" type="submit">
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
