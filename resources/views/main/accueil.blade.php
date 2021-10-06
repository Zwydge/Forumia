@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Knowledger
        </div>
        <div class="container_search_bar">
            <input placeholder="{{ __('Posez votre question') }}" class="search_bar" type="text">
        </div>
    </div>
@endsection


