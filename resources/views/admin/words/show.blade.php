@extends('layouts.app')

@section('title', 'Admin Show')

@section('content')
    <div class="container">

        <header>
            <h1 class="my-5">{{$word->title}}</h1>
        </header>
        
        <hr>
        
        <div class="clearfix">
            <p>{{$word->definition}}</p>
            <ul class="p-0">
                @foreach ($word->links as $link)
                    <li class="list-unstyled mb-2"><a href="{{ $link->url }}">{{ $link->label }}</a></li>
                @endforeach
            </ul>
            <div>
                <strong>Created at:</strong> {{$word->created_at}}
                <strong>Updated at:</strong> {{$word->updated_at}}
            </div>
        </div>
        
        <hr>
        
        <footer class="d-flex align-items-center justify-content-between">
            <a href="{{route('admin.words.index')}}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Go back
            </a>
            
            <div class="d-flex justify-content-between gap-2">
                <a href="{{route('admin.words.edit', $word->id)}}" class="btn btn-warning">
                    <i class="fas fa-pencil me-2"></i>Modifica
                </a>
                
                <form action="{{route('admin.words.destroy', $word->id)}}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="fas fa-trash-can me-2"></i>Elimina
                    </button>
                </form>
            </div>
        </footer>
    </div>
    @endsection