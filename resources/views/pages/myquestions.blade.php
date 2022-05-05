@extends('layouts.app')

@section('content')
    <div class="title_page">
        Mes questions
    </div>

    <div class="container_search_bar myquestion_bar">
        <input placeholder="{{ __('Chercher dans mes questions') }}" class="search_bar" type="text">
    </div>
    <div class="domains_list domain_css domain_myquestions">
        @include('layouts.domains', ['domains' => $domains])
    </div>
    <div class="result_part myquestions_result">
        <div class="actus_list">
            @include('layouts.questions', ['questions' => $questions])
        </div>
    </div>
@endsection
