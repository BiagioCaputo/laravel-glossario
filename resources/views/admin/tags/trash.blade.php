@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h1 class="text-center mb-3">Words Deleted</h1>

        </table>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Label</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Color Code</th>
                    <th scope="col">Color</th>
                    <th scope="col">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-arrow-left me-1"></i>Tags</a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>{{ $tag->label }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>
                            @if (!$tag->color)
                                <span>Nessun colore</span>
                            @else
                            {{ $tag->color }}
                            @endif
                        </td>
                        <td>
                            @if(!$tag->color)
                            <span>Nessun colore</span>
                            @else
                            <div style="width: 20px; height: 20px; background-color: {{ $tag->color }}"></div> <!-- Style provvisorio -->
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-pencil"></i></a>
                                <form action="{{ route('admin.tags.restore', $tag->id) }}" method="POST"
                                    class="restore-form">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm btn-success"><i class="fas fa-arrows-rotate"></i></button>
                                </form>
                                <form action="{{ route('admin.tags.drop', $tag) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">Cestino vuoto</td>
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

                const confirmation = confirm('Sicuro di voler eliminare questo tag?');
                if (confirmation) form.submit();
            })

        })
    </script>
@endsection
