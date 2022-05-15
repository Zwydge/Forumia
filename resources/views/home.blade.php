@extends('layouts.app')

@section('content')
<div class="container home_container">
    <div class="left_account_col">
        <div class="avatar avatar_img">
            <img src="{{asset("media/img/avatar/".auth()->user()->avatar)}}" alt="">
        </div>
        <div class="name">{{ auth()->user()->name }}</div>
        <div class="action_menu">
            <a href="{{route('account')}}" class="edit_account">
                <img src="{{ asset("media/img/tech/user.png") }}" alt="">
                Modifier mon compte
            </a>
            <a href="{{route('myquestions')}}" class="my_questions">
                <img src="{{ asset("media/img/tech/ask.png") }}" alt="">
                Mes questions
            </a>
            <a href="{{route('answers')}}" class="my_answers">
                <img src="{{ asset("media/img/tech/answer.png") }}" alt="">
                Mes réponses
            </a>
            <a href="{{route('mydomains')}}" class="my_domains">
                <img src="{{ asset("media/img/tech/puzzle.png") }}" alt="">
                Mes domaines
            </a>
            <a href="{{route('ask')}}" class="ask_a_question">
                <img src="{{ asset("media/img/tech/asking.png") }}" alt="">
                Poser une question
            </a>
        </div>

    </div>
    <div class="center_actus">
        <div class="domains_list domain_css">
            @include('layouts.domains', ['domains' => $domains])
        </div>
        <div class="actus_list">
            @include('layouts.questions', ['questions' => $questions])
        </div>
    </div>
</div>
@endsection
