@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center mb-3">Words</h1>
            <div>
                <form action="{{route('admin.words.index')}}" method="GET">
                    <div class="d-flex align-items-center gap-2">
                        {{-- Filtro Tag --}}
                        <select class="form-select" name="tag_filter">
                            <option value="">Tutti i tag</option>
                            @foreach($tags as $tag)
                            <option value={{ $tag->id }} @if($tag_filter == $tag->id) selected @endif>{{ $tag->label }}</option>
                            @endforeach
                        </select>

                        {{-- Search --}}
                        <input type="search" class="form-control" placeholder="Cerca Word" name="search" value="{{ $search }}" autofocus>

                        {{-- Button form --}}
                        <button class="btn btn-outline-secondary">Filtra</button>

                    </div>

                </form>
            </div>
        </div>

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
                            <a href="{{ route('admin.words.trash') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center"><i
                                    class="fas fa-trash me-1"></i>Cestino</a>

                            <a href="{{ route('admin.words.create') }}"
                                class="btn btn-success btn-sm d-flex align-items-center"><i
                                    class="fas fa-plus me-1"></i>Nuova</a>
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
                        <td>{{ $word->abstract() }}...</td>
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
                    <td colspan="7">Non sono presenti parole</td>
                @endforelse
            </tbody>
        </table>
        @if ($words->hasPages())
            {{ $words->links() }}
        @endif

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
