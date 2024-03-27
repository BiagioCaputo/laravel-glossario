{{--Layout--}}
@extends('layouts.app')

{{--Titolo--}}
@section('title', 'Create_Word')

{{--Contenuto principale pagina--}}
@section('content')

<header>
    <h1 class="text-center my-5">Crea una nuova parola nel Glossario</h1>
</header>


    {{--Form per la modifica di un progetto--}}
    <div class="container py-5">
        @include('includes.words.form')      
    </div>


@endsection


{{--Scripts--}}
@section('scripts')
    @vite('resources/js/slug_field.js')
@endsection