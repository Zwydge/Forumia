@extends('layouts.app')

@section('content')
    <div class="content domains-page">
        <div class="domains-title-page">Catégories disponibles</div>
        <div class="domains-container">
            @foreach($domains as $domain)
                <a href="{{route('search', ['domain' => $domain->label])}}" class="domain-element">
                    <img class="logo-icon-domain" src="{{asset("media/img/domains/".$domain->label.".png")}}" alt="logo domain">
                    <div class="label-domain">{{$domain->label}}</div>
                    <div class="stats-domains">
                        <div class="questions-domains">
                            <img src="{{asset("media/img/tech/ask.png")}}" alt="question">
                            <div class="nb-question-domains">{{$domain->questions}}</div>
                        </div>
                        <div class="views-domains">
                            <img src="{{asset("media/img/tech/view.png")}}" alt="views">
                            <div class="nb-views-domains">{{$domain->views}}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
