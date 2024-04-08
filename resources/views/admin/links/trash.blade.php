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
                    <th scope="col">Url</th>
                    <th scope="col">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.links.index') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-arrow-left me-1"></i>Links</a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($links as $link)
                    <tr>
                        <th scope="row">{{ $link->id }}</th>
                        <td>{{ $link->label }}</td>
                        <td>{{ $link->url }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.links.edit', $link) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-pencil"></i></a>
                                <form action="{{ route('admin.links.restore', $link->id) }}" method="POST"
                                    class="restore-form">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm btn-success"><i class="fas fa-arrows-rotate"></i></button>
                                </form>
                                <form action="{{ route('admin.links.drop', $link) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="4">Cestino vuoto</td>
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
