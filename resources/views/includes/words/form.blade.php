@if($word->exists)
<form action="{{route('admin.words.update', $word->id)}}" method="POST">
    @method('PUT')
@else
<form action="{{route('admin.words.store')}}" method="POST">
@endif
@csrf
    <div class="row align-items-center justify-content-start">
        {{-- Titolo --}}
        <div class="col-6">
            <div class="mb-4">
                <label for="title" class="form-label">Parola</label>
                <input type="text" class="form-control @error('title') is-invalid @elseif(old('title', '')) is-valid @enderror" id="title" name="title" placeholder="Etichetta..." value="{{old('title', $word->title)}}">
                @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        {{-- Slug --}}
        <div class="col-6">
            <div class="mb-4">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" value="{{ Str::slug(old('title', $word->title)) }}" disabled>
            </div>
        </div>
        {{-- Definizione --}}
        <div class="col-12">
            <div class="mb-5">
                <label for="definition" class="form-label">Descrizione</label>
                <textarea class="form-control @error('definition') is-invalid @elseif(old('definition', '')) is-valid @enderror" id="definition" name="definition" rows="8">
                    {{old('definition', $word->definition)}}
                </textarea>
                @error('definition')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <hr>
    {{-- Bottoni --}}
    <div class="d-flex justify-content-between my-5">
        <a href="{{route('admin.words.index')}}" class="btn btn-primary"><i class="fa-solid fa-left-long me-2"></i>Torna indietro</a>
        <div class="d-flex gap-2">
            {{--<button class="btn btn-secondary"><i class="fas fa-eraser me-2"></i>Cancella</button>--}}
            <button class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Conferma</button>
        </div>
    </div>
</form> 