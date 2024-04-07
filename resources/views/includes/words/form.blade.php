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
    {{-- Tags --}}
    <div class="col-12" x-data="{ isOpen: false }">
        <a @click="isOpen = !isOpen" class="btn btn-primary my-3">Tags</a>
        <div x-show="isOpen">
            <div class="d-flex justify-content-between mb-4">
                <div class="col-10">
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="tags[]" 
                            type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}"
                            @if(in_array($tag->id, old('tags', $previous_tags ?? []))) checked @endif>
                            <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->label}}</label>
                        </div>
                    @endforeach
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
            </div>
        </div>
    </div>
    
    {{-- Links --}}
    <div class="d-flex gap-1">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#link-1" role="button" aria-expanded="false" aria-controls="link-1"><i class="fas fa-plus"></i> Link</a>
        <a class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="link-1 link-2 link-3">Mostra tutti</a>
    </div>
    <div class="row">

        {{--Link n.1--}}
        <div class="col-12">
            <div class="collapse multi-collapse" id="link-1">
                <div class="row">
                    <div class="col-6 mt-4">
                        <label for="label-1" class="form-label">Label</label>
                        <input type="text" class="form-control @error('links.0.label') is-invalid @elseif (old('links.0.label', '')) is-valid @enderror" id="label-1" name="links[0][label]" placeholder="Inserisci un nome del link..." value="{{ old('links.0.label', isset($links[0]) ? $links[0]->label : '') }}">
                        @error('links.0.label')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="url-1" class="form-label">Url</label>
                        <input type="url" class="form-control @error('links.0.url') is-invalid @elseif (old('links.0.url', '')) is-valid @enderror" id="url-1" name="links[0][url]" placeholder="Inserisci un url del link..."  value="{{ old('links.0.url', isset($links[0]) ? $links[0]->url : '') }}">
                        @error('links.0.url')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <a class="btn btn-primary my-4" type="button" data-bs-toggle="collapse" data-bs-target="#link-2" aria-expanded="false" aria-controls="link-2">More <i class="fas fa-link"></i></a>
              </div>
            </div>

            {{--Link n.2--}}
            <div class="col-12">
                <div class="collapse multi-collapse" id="link-2">
                    <div class="row">
                        <div class="col-6">
                            <label for="label-2" class="form-label">Label</label>
                            <input type="text" class="form-control  @error('links.1.label') is-invalid @elseif (old('links.1.label', '')) is-valid @enderror"  id="label-2" name="links[1][label]" placeholder="Inserisci un nome del link..."  value="{{ old('links.1.label', isset($links[1]) ? $links[1]->label : '') }}">
                            @error('links.1.label')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="url-2" class="form-label">Url</label>
                            <input type="url" class="form-control @error('links.1.url') is-invalid @elseif (old('links.1.url', '')) is-valid @enderror"  id="url-2"  name="links[1][url]"  placeholder="Inserisci un url del link..."  value="{{ old('links.1.url', isset($links[1]) ? $links[1]->url : '') }}">
                            @error('links.1.url')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <a class="btn btn-primary my-4" type="button" data-bs-toggle="collapse" data-bs-target="#link-3" aria-expanded="false" aria-controls="link-3">More <i class="fas fa-link"></i></a>
                </div>
            </div>

            {{--Link n.3--}}
            <div class="col-12">      
              <div class="collapse multi-collapse" id="link-3">
                <div class="row">
                    <div class="col-6">
                        <label for="label-3" class="form-label">Label</label>
                        <input type="text" class="form-control  @error('links.2.label') is-invalid @elseif (old('links.2.label', '')) is-valid @enderror"  id="label-3" name="links[2][label]" placeholder="Inserisci un nome del link..." value="{{ old('links.2.label', isset($links[2]) ? $links[2]->label : '') }}">
                        @error('links.2.label')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="url-3" class="form-label">Url</label>
                        <input type="url" class="form-control @error('links.2.url') is-invalid @elseif (old('links.2.url', '')) is-valid @enderror" id="url-3" name="links[2][url]" placeholder="Inserisci un url del link..."  value="{{ old('links.2.url', isset($links[2]) ? $links[2]->url : '') }}">
                        @error('links.2.url')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
              </div>
            </div>

        </div>
    </div>


    
    

    {{-- Bottoni --}}
    <div class="d-flex justify-content-between my-5">
        <a href="{{route('admin.words.index')}}" class="btn btn-primary"><i class="fa-solid fa-left-long me-2"></i>Torna indietro</a>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Conferma</button>
    </div>
</div>
</form>

