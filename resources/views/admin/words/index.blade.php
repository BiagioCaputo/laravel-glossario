@extends('layouts.app')

@section('content')
<div class="container">
    <table>
        <tr>
            <th>Titolo</th>
            <th>Slug</th>
            <th>Definizione</th>
            <th>Azioni</th>
        </tr>
        @forelse($words as $word)
        <tr>
            <td>{{ $word->title }}</td>
            <td>{{ $word->slug }}</td>
            <td>{{ $word->definition }}</td>
            <td>
                <a href=""><i class="fas fa-eye"></i></a>
                <a href=""><i class="fas fa-pencil"></i></a>
                <form action="">
                    <button>
                        <i class="fas fa-trash-can"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <h1>Non ci sono parole...</h1>
        @endforelse
        
    </table>
</div>


@endsection
