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
            <a href="" class="my_questions">
                <img src="{{ asset("media/img/tech/ask.png") }}" alt="">
                Mes questions
            </a>
            <a href="" class="my_answers">
                <img src="{{ asset("media/img/tech/answer.png") }}" alt="">
                Mes réponses
            </a>
            <a href="" class="my_domains">
                <img src="{{ asset("media/img/tech/puzzle.png") }}" alt="">
                Mes domaines
            </a>
            <a href="" class="ask_a_question">
                <img src="{{ asset("media/img/tech/asking.png") }}" alt="">
                Poser une question
            </a>
        </div>

    </div>
    <div class="center_actus">
        <div class="domains_list domain_css">
            <div class="domain_btn"><img src="{{ asset("media/img/domains/animals.png") }}" alt=""></div>
            <div class="domain_btn"><img src="{{ asset("media/img/domains/animals.png") }}" alt=""></div>
        </div>
        <div class="actus_list">
            @for ($i = 0; $i < 10; $i++)
            <div class="actus_elem">
                <fieldset>
                    <legend>Animaux</legend>
                    <div class="content_question">
                        <div class="left_avatar_ask avatar_img">
                            <img src="{{asset("media/img/avatar/zwedge.jpg")}}" alt="">
                            <div class="pseudo_ask">Zwedge</div>
                        </div>
                        <div class="right_question_ask">
                            <div class="question">Quel produit dois-je utiliser pour les puces de mon chien ?</div>
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
                        <div class="action_elem">
                            <img src="{{asset("media/img/tech/share.png")}}" alt="">
                        </div>
                        <div class="action_elem">
                            <img src="{{asset("media/img/tech/flag.png")}}" alt="">
                        </div>
                    </div>
                </fieldset>
            </div>
            @endfor
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
