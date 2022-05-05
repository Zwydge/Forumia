@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="content_question">
            <div class="left_author_quest">
                <img src="{{ asset("media/img/avatar/".$question[0]->avatar) }}" alt="">
                <div class="authorname">{{ $question[0]->name }}</div>
            </div>
            <div class="right_question_content">
                <div class="content_quest">{{ $question[0]->content }}</div>
            </div>
            @if($question[0]->video_path && $question[0]->video_path != "path")
                <div class="video_part-quest">
                    <div class="video-infos">{{ $question[0]->name }} a ajouté une vidéo a sa question</div>
                    <video class="video_element_quest" controls src="{{asset("media/img/questions/".$question[0]->video_path)}}"></video>
                </div>
            @endif
        </div>
        @if (Auth::check())
            <div class="leave_comment">
                <div class="left_comment">
                    <img src="{{asset("media/img/avatar/".auth()->user()->avatar)}}" alt="">
                    <div class="authorname">{{ auth()->user()->name }}</div>
                </div>
                <div class="right_comment">
                    <form method="POST" action="{{route('create-answer')}}">
                        @csrf
                        <input type="hidden" name="question" value="{{$question[0]->id}}">
                        <textarea required name="comment_send"></textarea>
                        <input type="submit" value="Envoyer" class="send_comment">
                    </form>
                </div>
            </div>
        @endif
        <div class="content_answers">
            <div class="title_answers">{{ count($answers) }} réponses</div>
            @foreach($answers as $answer)

                @if(!$answer->answer_to)
                    <div class="one_answers">
                        <div class="left_ans">
                            <img src="{{ asset("media/img/avatar/".$answer->avatar) }}" alt="">
                            <div class="anthor_ans">{{ $answer->name }}</div>
                        </div>
                        <div class="right_ans">
                            <div class="content_ans">{{ $answer->ans_content }}</div>
                            @foreach($answers as $answer_spe)
                                @if($answer_spe->answer_to && $answer_spe->answer_to == $answer->id)
                                    <div class="answer_spe">
                                        <div class="left_spe">
                                            <img src="{{ asset("media/img/avatar/".$answer->avatar) }}" alt="">
                                            <div class="anthor_spe">{{ $answer_spe->name }}</div>
                                        </div>

                                        <div class="right_spe">
                                            <div class="content_spe">{{ $answer_spe->ans_content }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
