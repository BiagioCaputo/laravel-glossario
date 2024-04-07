@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h1 class="text-center mb-3">Words Deleted</h1>

        </table>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Definizione</th>
                    <th scope="col">Links</th>
                    <th scope="col">Tags</th>
                    <th scope="col">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.words.index') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-arrow-left me-1"></i>Words</a>
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
                        <td>{{ $word->abstract() }}</td>
                        <td>
                            <ul class="p-0">
                                @foreach ($word->links as $link)
                                    <li class="mb-2 list-unstyled"><a href="{{ $link->url }}">{{ $link->label }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @forelse($word->tags as $tag)
                                <span class="badge"
                                    style="background-color: {{ $tag->color }}">{{ $tag->label }}</span>
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.words.show', $word) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.words.edit', $word) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-pencil"></i></a>
                                <form action="{{ route('admin.words.destroy', $word) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="7">Cestino vuoto</td>
                @endforelse
            </tbody>
        </table>
    </div>


@endsection
@section('scripts')
    <script>
        const deleteForms = document.querySelectorAll('.delete-form')

        deleteForms.forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();

                const confirmation = confirm('Sicuro di voler eliminare questo termine?');
                if (confirmation) form.submit();
            })

        })
    </script>
@endsection
