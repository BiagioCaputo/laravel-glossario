@extends('layouts.app')

@section('content')
<div class="container py-5">
        
    </table>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Label</th>
            <th scope="col">Slug</th>
            <th scope="col">Color Code</th>
            <th scope="col">Color</th>
            <th></th>
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
                        <a href="{{ route('admin.tags.edit', $tag)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
                        <form action="{{route('admin.tags.destroy', $tag)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>                
                </td>
            </tr>
            @empty
            <td colspan="4">Non sono presenti</td>
            @endforelse
        </tbody>
    </table>    

    @if ($tags->hasPages())
    {{ $tags->links()}}
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