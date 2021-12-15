@extends('layouts.app')

@section('content')
<div class="container home_container">
    <div class="left_account_col">
        <div class="avatar avatar_img">
            <img src="{{asset("media/img/avatar/zwedge.jpg")}}" alt="">
        </div>
        <div class="name">Zwedge</div>
        <div class="action_menu">
            <a href="" class="edit_account">
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
            @foreach($domains as $domain)
                <div class="domain_btn" enable="disable" domain-id="{{ $domain['label'] }}">{{ $domain['label'] }}</div>
            @endforeach
        </div>
        <div class="actus_list">
            @foreach ($questions as $question)
            <div class="actus_elem" data-groups='["{{$question->label}}"]' data-date-created="2016-08-12">
                <fieldset>
                    <legend>{{ $question->label }}</legend>
                    <div class="content_question">
                        <div class="left_avatar_ask avatar_img">
                            <img src="{{asset("media/img/avatar/zwedge.jpg")}}" alt="">
                        </div>
                        <div class="right_question_ask">
                            <div class="question">{{ $question->content }}</div>
                            <div class="author">{{$question->name}}</div>
                        </div>
                    </div>
                    <div class="content_actions">
                        <div class="action_elem">
                            <img src="{{asset("media/img/tech/view.png")}}" alt="">
                            <span class="number_stat">457</span>
                        </div>
                        <div class="action_elem">
                            <img src="{{asset("media/img/tech/comment.png")}}" alt="">
                            <span class="number_stat">47</span>
                        </div>
                        <div class="action_elem">
                            <img src="{{asset("media/img/tech/like.png")}}" alt="">
                            <span class="number_stat">19</span>
                        </div>
                    </div>
                </fieldset>
            </div>
            @endforeach
        </div>
    </div>
    <div class="right_domains domain_css">
        <div class="elem_right_domain">
            <img src="{{ asset("media/img/domains/animals.png") }}" alt="">
        </div>
        <div class="elem_right_domain">
            <img src="{{ asset("media/img/domains/animals.png") }}" alt="">
        </div>
        <div class="elem_right_domain">
            <img src="{{ asset("media/img/domains/animals.png") }}" alt="">
        </div>
        <div class="elem_right_domain">
            <img src="{{ asset("media/img/domains/animals.png") }}" alt="">
        </div>
    </div>
</div>
@endsection
