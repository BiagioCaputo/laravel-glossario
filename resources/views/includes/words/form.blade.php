@if($word->exists)
<form action="{{route('admin.words.update', $word->id)}}" method="POST">
    @method('PUT')
@else
<form action="{{route('admin.words.store')}}" method="POST">
@endif
@csrf
    <div class="row align-items-center">
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
        </div>

        {{-- Campo per modificare link esistenti --}}
        @if (!empty($links))
        @foreach ($links as $index => $link)
            <div class="col-12 row my-2">
                <div class="col-6">
                    <div class="form-group">
                        <label for="links[{{ $index }}][label]" class="form-label">Label</label>
                        <input type="text" name="links[{{ $index }}][label]" value="{{ old("links.$index.label", $link['label']) }}" class="form-control @error("links.$index.label") is-invalid @enderror">
                        @error("links.$index.label")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="links[{{ $index }}][url]" class="form-label">URL</label>
                        <input type="text" name="links[{{ $index }}][url]" value="{{ old("links.$index.url", $link['url']) }}" class="form-control @error("links.$index.url") is-invalid @enderror">
                        @error("links.$index.url")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        @endforeach
        @endif
     
        <!-- Campo per aggiungere un nuovo link -->
        <div x-data="{ newLinksCounter: 0 }">
            <a @click="newLinksCounter++" class="btn btn-primary my-2">Aggiungi link</a>
            <template x-for="i in newLinksCounter"> <!-- In Alpine la direttiva x-for va indicata in un template -->
                <div class="col-12 row my-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label x-bind:for="'new_links[' + i + '][label]'">Nuovo Label</label>
                            <input type="text" x-bind:name="'new_links[' + i + '][label]'" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label x-bind:for="'new_links[' + i + '][url]'">Nuovo URL</label>
                            <input type="text" x-bind:name="'new_links[' + i + '][url]'" class="form-control">
                        </div>
                    </div>
                </div>
            </template>
        </div>


        
        

        {{-- Bottoni --}}
        <div class="d-flex justify-content-between my-5">
            <a href="{{route('admin.words.index')}}" class="btn btn-primary"><i class="fa-solid fa-left-long me-2"></i>Torna indietro</a>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Conferma</button>
        </div>
    </div>
</form>

