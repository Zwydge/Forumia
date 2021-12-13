@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Nouvelle question
        </div>
        <div class="container_search_bar">
            <form id="ask-form" action="{{ route('createquest') }}" method="POST">
                <input placeholder="{{ __('Posez votre question') }}" name="question" class="search_bar" type="text">
                <div class="checkbox_domains">
                    @foreach($domains as $domain)
                        <input type="radio" name="domains" value="{{ $domain['id'] }}" id="domain_{{ $domain['id'] }}">
                        <label class="label_{{ $domain['id'] }}" for="domain_{{ $domain['id'] }}">{{ $domain['label'] }}</label>
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
