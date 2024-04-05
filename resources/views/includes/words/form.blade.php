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
        {{-- Links --}}
        <p class="d-inline-flex gap-1">
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#link-1" role="button" aria-expanded="false" aria-controls="link-1"><i class="fas fa-plus"></i> Link</a>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="link-1 link-2 link-3">Mostra tutti</button>
        </p>
          <div class="row">
            <div class="col-12">
                {{-- Primo gruppo input --}}
              <div class="collapse multi-collapse" id="link-1">
                <div class="row">
                    <div class="col-6">
                        <label for="label-1" class="form-label">Label</label>
                        <input type="text" class="form-control" id="label-1" name="label-1" placeholder="Inserisci un nome del link..." value="old('label-1', $link->0->label)">
                    </div>
                    <div class="col-6">
                        <label for="url-1" class="form-label">Url</label>
                        <input type="url" class="form-control" id="url-1" name="url-1" placeholder="Inserisci un url del link..." value="old('url-1', $link->1->url)">
                    </div>
                </div>
                <button class="btn btn-primary my-4" type="button" data-bs-toggle="collapse" data-bs-target="#link-2" aria-expanded="false" aria-controls="link-2">More <i class="fas fa-link"></i></button>
              </div>
            </div>
            <div class="col-12">
            {{-- Secondo gruppo input --}}
                <div class="collapse multi-collapse" id="link-2">
                    <div class="row">
                        <div class="col-6">
                            <label for="label-2" class="form-label">Label</label>
                            <input type="text" class="form-control" id="label-2" name="label-2" placeholder="Inserisci un nome del link..." value="old('label-2', $link->1->label)">
                        </div>
                        <div class="col-6">
                            <label for="url-2" class="form-label">Url</label>
                            <input type="url" class="form-control" id="url-2"  name="url-2"  placeholder="Inserisci un url del link..." value="old('url-2', $link->1->url)">
                        </div>
                    </div>
                    <button class="btn btn-primary my-4" type="button" data-bs-toggle="collapse" data-bs-target="#link-3" aria-expanded="false" aria-controls="link-3">More <i class="fas fa-link"></i></button>
                </div>
            </div>
            <div class="col-12">
            {{-- Terzo gruppo input --}}
              <div class="collapse multi-collapse" id="link-3">
                <div class="row">
                    <div class="col-6">
                        <label for="label-3" class="form-label">Label</label>
                        <input type="text" class="form-control" id="label" name="label-3" placeholder="Inserisci un nome del link..." value="old('label-3', $link->2->label)">
                    </div>
                    <div class="col-6">
                        <label for="url-3" class="form-label">Url</label>
                        <input type="url" class="form-control" id="url-3" name="url_3" placeholder="Inserisci un url del link..." value="old('url-3', $link->2->url)">
                    </div>
                </div>
              </div>
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