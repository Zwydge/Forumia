@foreach ($questions as $question)
    <a href="{{route('question', ["id" => $question->id])}}" class="actus_elem" data-groups='["{{$question->label}}"]' data-date-created="2016-08-12">
        <fieldset>
            <div class="abso_img_domain">
                <img src="{{ asset("media/img/domains/".$question->label.".png") }}" alt="">
            </div>
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
                    <span class="number_stat">{{$question->views}}</span>
                </div>
                <div class="action_elem">
                    <img src="{{asset("media/img/tech/comment.png")}}" alt="">
                    <span class="number_stat">
                        @php
                            $nb = 0;
                        @endphp
                        @foreach($answers as $answer)
                            @if($answer["questions_id"] == $question->id)
                                @php
                                    $nb++;
                                @endphp
                            @endif
                        @endforeach
                        {{ $nb }}
                    </span>
                </div>
                <div class="action_elem">
                    <img src="{{asset("media/img/tech/like.png")}}" alt="">
                    <span class="number_stat">19</span>
                </div>
            </div>
        </fieldset>
    </a>
@endforeach
