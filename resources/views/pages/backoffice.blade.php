@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Backoffice
        </div>
        <div class="content-api">
            <input type="password" name="api-key" id="api-key">
        </div>
        <div class="container_search_bar">
            <div class="btn-generate create-user">
                Générer un utilisateur
            </div>
            <div class="btn-generate create-question">
                Générer une question
            </div>
            <div class="btn-generate create-answer">
                Générer une réponse
            </div>
        </div>
    </div>
@endsection
