@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            ForumIA
        </div>
        @include('layouts.globe')
        <div class="container_search_bar accueil_bar">
            <input placeholder="{{ __('Posez votre question') }}" class="search_bar" type="text">
        </div>
        <div class="domains_list domain_css accueil_domains">
            @include('layouts.domains', ['domains' => $domains])
        </div>
        <div class="result_part">
            <div class="actus_list">
                @include('layouts.questions', ['questions' => $questions])
            </div>
        </div>
    </div>
@endsection


