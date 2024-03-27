@extends('layouts.app')

@section('content')
<div class="container py-5">
        
    </table>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Definizione</th>
            <th scope="col">
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.words.create')}}" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i>Nuova</a>
                </div>
            </th>
          </tr>
        </thead>
        <tbody>
            @forelse($words as $word)
            <tr>
                <th scope="row">{{ $word->id }}</th>
                <td>{{ $word->title }}</td>
                <td>{{ $word->slug }}</td>
                <td>{{ $word->definition }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.words.show', $word)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.words.edit', $word)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
                        <form action="{{route('admin.words.destroy', $word)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button word='submit' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>                
                </td>
            </tr>
            @empty
            <td colspan="5">Non sono presenti parole</td>
            @endforelse
        </tbody>
    </table>    

</div>


@endsection
