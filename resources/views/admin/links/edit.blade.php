{{--Layout--}}
@extends('layouts.app')

{{--Titolo--}}
@section('title', 'Edit_Word')

{{--Contenuto principale pagina--}}
@section('content')

<header>
    <h1 class="text-center my-5">Modifica un Link</h1>
</header>
<div class="container">
<form action="{{route('admin.links.update', $link->id)}}" method="POST">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-6">
            <label for="label" class="form-label">Label</label>
            <input type="text" name="label" value="{{old('label', $link->label)}}" class="form-control @error('label') is-invalid @elseif(old('label', '')) is-valid @enderror" id="label" placeholder="Inserisci un nome del link...">
            @error('label')   
                <div class="invalid-feedback">{{$message}}</div>
            @else
                <div class="form-text">
                    Inserisci il label del link
                </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="url" class="form-label">Url</label>
            <input type="url" name="url" value="{{old('url', $link->url)}}" class="form-control @error('url') is-invalid @elseif(old('url', '')) is-valid @enderror" id="url" placeholder="Inserisci un url del link...">
            @error('url')   
                <div class="invalid-feedback">{{$message}}</div>
            @else
                <div class="form-text">
                    Inserisci l'url del link
                </div>
            @enderror
        </div>
    </div>
    <hr>
    {{-- Bottoni --}}
    <div class="d-flex justify-content-between my-3">
        <a href="{{route('admin.links.index')}}" class="btn btn-primary"><i class="fa-solid fa-left-long me-2"></i>Torna indietro</a>
        <div class="d-flex gap-2">
            <button class="btn btn-secondary" type="reset"><i class="fas fa-eraser me-2"></i>Cancella</button>
            <button class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Conferma</button>
        </div>
    </div>
</form>
</div>




@endsection