
<form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="row align-items-center justify-content-start">
        {{-- Label --}}
        <div class="col-6">
            <div class="mb-4">
                <label for="label" class="form-label">Etichetta</label>
                <input type="text" class="form-control @error('label') is-invalid @elseif(old('label', '')) is-valid @enderror" id="label" name="label" placeholder="Etichetta..." value="{{old('label', $tag->label)}}">
                @error('label')
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
                <input type="text" class="form-control" id="slug" value="{{ Str::slug(old('label', $tag->label)) }}" disabled>
            </div>
        </div>
        {{-- Color --}}
        <div class="col-6">
            <div class="mb-4">
                <label for="color" class="form-label">Colore</label>
                <input type="text" class="form-control @error('color') is-invalid @elseif(old('color', '')) is-valid @enderror" id="color" name="color" placeholder="Es.(#F16529)" value="{{old('color', $tag->color)}}">
                @error('color')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    <hr>
    {{-- Bottoni --}}
    <div class="d-flex justify-content-between my-5">
        <a href="{{route('admin.tags.index')}}" class="btn btn-primary"><i class="fa-solid fa-left-long me-2"></i>Torna indietro</a>
        <div class="d-flex gap-2">
            {{--<button class="btn btn-secondary"><i class="fas fa-eraser me-2"></i>Cancella</button>--}}
            <button class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Conferma</button>
        </div>
    </div>
</form> 