@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="content_question">
            <div class="left_author_quest">
                <img src="{{ asset("media/img/avatar/zwedge.jpg") }}" alt="">
                <div class="authorname">Kévin</div>
            </div>
            <div class="right_question_content">
                <div class="content_quest">Content question test de question bla bla ?</div>
            </div>
        </div>
        <div class="content_answers">
            <div class="one_answers">

            </div>
        </div>
    </div>
@endsection
