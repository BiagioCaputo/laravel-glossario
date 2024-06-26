@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section id="guest-home">
    <div class="container">
        <div class="row my-5">
            <h1 class="text-center">Glossario</h1>
            @forelse ($words as $word)
                <div class="col-3 g-4">
                    <div class="card">
                        <div class="card-header text-center">
                            {{$word->title}}
                        </div>
                        <div class="card-body">
                            {{$word->definition}}
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{route('guest.words.show', $word->id)}}" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass me-2"></i>Vedi</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card">Non ci sono parole</div>
                </div>
            @endforelse
        </div>
        @if ($words->hasPages())
        {{ $words->links()}}
    @endif  
    </div>
</section>


@endsection