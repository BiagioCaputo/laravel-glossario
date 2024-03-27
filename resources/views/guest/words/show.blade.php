@extends('layouts.app')

@section('title', 'Word')

@section('content')

<section id="guest-show">
    <div class="container">
        <div class="row">
            <h1 class="text-center my-4">{{$word->title}}</h1>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="mt-2"><strong>Creato il:</strong> {{$word->created_at}}</div>
                            <div><strong>Ultima modifica:</strong> {{$word->updated_at}}</div>
                        </div>
                        <div class="col-8">
                            <p>{{$word->definition}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="d-flex justify-content-between align-items-center my-4 p-0">
                <a href="{{route('guest.home')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Go back</a>
            </footer>

        </div>
    </div>
</section>


@endsection