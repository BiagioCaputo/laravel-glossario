{{--Layout--}}
@extends('layouts.app')

{{--Titolo--}}
@section('title', 'Edit_Word')

{{--Contenuto principale pagina--}}
@section('content')

<header>
    <h1 class="text-center my-5">Modifica un tag del Glossario</h1>
</header>


    {{--Form per la modifica di un progetto--}}
    <div class="container py-5">
        @include('includes.tags.form')      
    </div>


@endsection


{{--Scripts--}}
@section('scripts')
    @vite('resources/js/slug_field.js')
@endsection