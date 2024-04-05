@extends('layouts.app')

@section('content')
<div class="container py-5">
        
    </table>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Label</th>
            <th scope="col">Url</th>
            <th scope="col">
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.links.create')}}" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i>Nuova</a>
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
                        <a href="{{ route('admin.links.edit', $link)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
                        <form action="{{route('admin.links.destroy', $link)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button link='submit' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>                
                </td>
            </tr>
            @empty
            <td colspan="4">Non sono presenti parole</td>
            @endforelse
        </tbody>
    </table>    

</div>


@endsection
